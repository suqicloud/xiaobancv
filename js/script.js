document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('resume-form');
    const preview = document.querySelector('.preview');
    const avatarInput = document.getElementById('avatar');
    const avatarImg = document.querySelector('.header-avatar img');
    const resumeContainer = document.getElementById('resume-container');
    const toggleBorder = document.getElementById('toggle-border');
    const borderColorPicker = document.getElementById('border-color');
    const headingColorPicker = document.getElementById('heading-color');
    const toggleHeaderBgColor = document.getElementById('toggle-header-bg-color');
    const headerBgColorPicker = document.getElementById('header-bg-color');
    const separatorColorPicker = document.getElementById('separator-color');
    const nameColorPicker = document.getElementById('name-color');
    const resetDefaultsButton = document.getElementById('reset-defaults');

    // 默认设置值
    const defaultSettings = {
        toggleBorder: false,
        borderColor: '#e0e0e0',
        headingColor: '#007bff',
        nameColor: '#333333',
        separatorColor: '#dcdcdc',
        toggleHeaderBgColor: false
    };


    // 实时更新简历预览
    form.addEventListener('input', () => {
        updatePreview();
    });

    // 监听文件上传事件，显示头像预览
    avatarInput.addEventListener('change', (event) => {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                avatarImg.src = e.target.result;
                updatePreview();
            };
            reader.readAsDataURL(file);
        }
    });

    // 监听复选框和颜色选择器的变化
    toggleBorder.addEventListener('change', () => {
        updatePreview();
    });

    headingColorPicker.addEventListener('input', () => {
        updatePreview();
    });

    borderColorPicker.addEventListener('input', () => {
        updatePreview();
    });

    toggleHeaderBgColor.addEventListener('change', () => {
        updatePreview();
    });

    headerBgColorPicker.addEventListener('input', () => {
        updatePreview();
    });

    separatorColorPicker.addEventListener('input', () => {
        updatePreview();
    });

    nameColorPicker.addEventListener('input', () => {
        updatePreview();
    });

    // 恢复默认设置
    resetDefaultsButton.addEventListener('click', () => {
        toggleBorder.checked = defaultSettings.toggleBorder;
        borderColorPicker.value = defaultSettings.borderColor;
        headingColorPicker.value = defaultSettings.headingColor;
        nameColorPicker.value = defaultSettings.nameColor;
        separatorColorPicker.value = defaultSettings.separatorColor;
        toggleHeaderBgColor.checked = defaultSettings.toggleHeaderBgColor;
        updatePreview();
    });

    // 保存为JPG文件
    document.getElementById('save-jpg').addEventListener('click', () => {
        html2canvas(resumeContainer, {
            useCORS: true, // 如果有外部图片时启用
            allowTaint: true, // 允许跨域图片使用
            scrollY: -window.scrollY, // 修正滚动偏移
            scrollX: -window.scrollX
        }).then(canvas => {
            const imgData = canvas.toDataURL('image/jpeg');
            const a = document.createElement('a');
            a.href = imgData;
            a.download = 'resume.jpg';
            a.click();
        }).catch(error => {
            console.error('保存为JPG失败:', error);
        });
    });


    // 更新预览的方法
    function updatePreview() {
        const formData = new FormData(form);
        formData.append('toggleBorder', toggleBorder.checked ? 'yes' : 'no');
        formData.append('borderColor', borderColorPicker.value);
        formData.append('headingColor', headingColorPicker.value);
        formData.append('toggleHeaderBgColor', toggleHeaderBgColor.checked ? 'yes' : 'no');
        formData.append('headerBgColor', headerBgColorPicker.value);
        formData.append('separatorColor', separatorColorPicker.value);
        formData.append('nameColor', nameColorPicker.value);
        fetch('template.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.text())
        .then(html => {
            preview.innerHTML = html;
            attachEditableListeners();  // 重新附加编辑事件监听器
        });
    }

    // 监听预览区域内容的编辑并同步到表单
    function attachEditableListeners() {
        preview.querySelectorAll('[contenteditable="true"]').forEach(editableElement => {
            editableElement.addEventListener('input', (event) => {
                const fieldName = event.target.getAttribute('data-edit');
                const inputElement = form.querySelector(`[name="${fieldName}"]`);
                if (inputElement) {
                    inputElement.value = event.target.innerText;
                }
            });
        });
    }

    // 初始调用以附加事件
    attachEditableListeners();
});