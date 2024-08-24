<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>小半简历 - 免费在线生成通用简历模板</title>
    <meta name="keywords" content="小半简历,简历生成器,简历模板" />
    <meta name="description" content="小半简历提供一个简约通用的在线免费简历模板生成器。" />
    <link href="https://xbxzsp.xiaobansc.com/xbsc/2024/08/20240822224540591.png" rel="shortcut icon" />
    <link href="https://xbxzsp.xiaobansc.com/xbsc/2024/08/20240822224540591.png" type="image/png" rel="apple-touch-icon" />    
    <link rel="stylesheet" href="css/style.css">
    <script src="js/script.js" defer></script>
    <script src="js/html2canvas.min.js" defer></script>
</head>
<body>
    <div class="topbar">
        <h1>简约通用简历模板生成器</h1>
        <nav>
            <a href="https://tool.xiaobansc.com/" target="_blank" rel="external nofollow noopener noreferrer">小半工具箱</a>
            <a href="https://hao.jingxialai.com/" target="_blank" rel="external nofollow noopener noreferrer">Ai导航</a>
        </nav>
    </div>

    <div class="container">
        <div class="sidebar">
            <h2>简历功能选项</h2>
            <form id="resume-form" enctype="multipart/form-data">
                <label for="name">姓名:</label>
                <input type="text" id="name" name="name"><br>

                <label for="avatar">头像图片<span style="font-size: 12px; color: #0e65c2;">(只支持小于1MB大小的jpg或png格式图片)<span>:</label>
                <input type="file" id="avatar" name="avatar" accept="image/*"><br>

                <label for="gender">性别:</label>
                <input type="text" id="gender" name="gender"><br>

                <label for="age">年龄:</label>
                <input type="text" id="age" name="age"><br>

                <label for="education">学历:</label>
                <input type="text" id="education" name="education"><br>

                <label for="birthplace">籍贯:</label>
                <input type="text" id="birthplace" name="birthplace"><br>

                <label for="phone">联系电话:</label>
                <input type="text" id="phone" name="phone"><br>

                <label for="email-title">联系邮箱标题:</label>
                <input type="text" id="email-title" name="email-title" value="邮箱"><br>
                <label for="email">联系邮箱或其他:</label>
                <input type="email" id="email" name="email"><br>


                <label for="introduction">个人介绍:</label>
                <textarea id="introduction" name="introduction"></textarea><br>

                <label for="education-experience">教育背景:</label>
                <textarea id="education-experience" name="education-experience"></textarea><br>

                <label for="work-experience">工作经历:</label>
                <textarea id="work-experience" name="work-experience"></textarea><br>

                <label for="projects">工作项目:</label>
                <textarea id="projects" name="projects"></textarea><br>

                <label for="awards">获得奖项:</label>
                <textarea id="awards" name="awards"></textarea><br>

                <label for="evaluation">自我评价:</label>
                <textarea id="evaluation" name="evaluation"></textarea><br>

                <label for="custom1">自定义内容1:</label>
                <textarea id="custom1" name="custom1"></textarea><br>

                <label for="custom-title1">自定义内容1 标题:</label>
                <input type="text" id="custom-title1" name="custom-title1" value="自定义内容1"><br>

                <label for="custom2">自定义内容2:</label>
                <textarea id="custom2" name="custom2"></textarea><br>

                <label for="custom-title2">自定义内容2 标题:</label>
                <input type="text" id="custom-title2" name="custom-title2" value="自定义内容2"><br>
            </form>
        </div>

        <div class="preview" id="resume-container">
            <?php include 'template.php'; ?>
        </div>

        <div class="actions">
            <button id="save-jpg">保存为JPG图片</button>

            <div class="appearance-settings">
                <h3>外观设置</h3>
                <label>
                    <input type="checkbox" id="toggle-border"> 显示简历边框
                </label>

                <label>
                    <input type="checkbox" id="toggle-header-bg-color"> 显示姓名板块背景颜色
                </label>

                <label for="border-color">简历边框颜色:</label>
                <input type="color" id="border-color" value="#e0e0e0">

                <label for="header-bg-color">姓名板块背景颜色:</label>
                <input type="color" id="header-bg-color" value="#83c17a">

                <label for="name-color">姓名颜色:</label>
                <input type="color" id="name-color" value="#333333">

                <label for="heading-color">简历标题文字颜色:</label>
                <input type="color" id="heading-color" value="#007bff">

                <label for="separator-color">简历分隔线颜色:</label>
                <input type="color" id="separator-color" value="#dcdcdc">

                <button id="reset-defaults">恢复默认外观设置</button>
            </div>
    
            <div class="description">
                <p>在满世界花花绿绿背景的简历中<br>
                    一页简约的简历反而更吸引目光<br>
                    邮箱可以自定义，比如换成微信<br>
                    联系方式：QQ群 - 591117073
                </p>
            </div>

            <div class="advertisement">
                <img src="图片地址" alt="图片">
            </div>
    </div>
</div>
    <div class="footer">
        <p>&copy; 2024 小半简历模板生成器. All Rights Reserved.<br>
</p>
</div>
</body>
</html>
