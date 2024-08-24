<?php
define('MAX_FILE_SIZE', 1048576); // 1MB
$allowedTypes = ['image/jpeg', 'image/png']; // 允许的文件类型

$name = $_POST['name'] ?? '';
$avatar = $_FILES['avatar']['tmp_name'] ?? '';
$gender = $_POST['gender'] ?? '';
$age = $_POST['age'] ?? '';
$education = $_POST['education'] ?? '';
$birthplace = $_POST['birthplace'] ?? '';
$phone = $_POST['phone'] ?? '';
$emailTitle = $_POST['email-title'] ?? '邮箱';
$email = $_POST['email'] ?? '';
$introduction = $_POST['introduction'] ?? '';
$educationExperience = $_POST['education-experience'] ?? '';
$workExperience = $_POST['work-experience'] ?? '';
$projects = $_POST['projects'] ?? '';
$awards = $_POST['awards'] ?? '';
$evaluation = $_POST['evaluation'] ?? '';
$custom1 = $_POST['custom1'] ?? '';
$custom2 = $_POST['custom2'] ?? '';
$customTitle1 = $_POST['custom-title1'] ?? '自定义内容1';
$customTitle2 = $_POST['custom-title2'] ?? '自定义内容2';


// 头像上传处理
$avatarSrc = '';
$avatarError = '';
if ($avatar && isset($_FILES['avatar'])) {
    $fileInfo = pathinfo($_FILES['avatar']['name']);
    $fileSize = $_FILES['avatar']['size'];
    $fileType = $_FILES['avatar']['type'];
    
    if (in_array($fileType, $allowedTypes) && $fileSize <= MAX_FILE_SIZE) {
        $avatarSrc = 'data:image/' . $fileInfo['extension'] . ';base64,' . base64_encode(file_get_contents($avatar));
    } else {
        if (!in_array($fileType, $allowedTypes)) {
            $avatarError = '头像图片格式不符合要求，仅支持 JPG 和 PNG 格式。';
        }
        if ($fileSize > MAX_FILE_SIZE) {
            $avatarError = '头像图片大小超出限制，请上传小于 1MB 的图片。';
        }
        $avatarSrc = ''; // 不显示头像
    }
}

// 外观设置的处理
$showBorder = $_POST['toggleBorder'] === 'yes';
$borderColor = $_POST['borderColor'] ?? '#e0e0e0';
$headingColor = $_POST['headingColor'] ?? '#007bff';
$showHeaderBgColor = $_POST['toggleHeaderBgColor'] === 'yes';
$headerBgColor = $_POST['headerBgColor'] ?? '#83c17a';
$nameColor = $_POST['nameColor'] ?? '#333333';
$separatorColor = $_POST['separatorColor'] ?? '#dcdcdc';

// 动态样式
$borderStyle = $showBorder ? "border: 2px solid $borderColor;" : "border: none;";
$headerStyle = $showHeaderBgColor ? "background-color: $headerBgColor;" : "";

?>

<div id="resume-content" class="resume" style="<?php echo $borderStyle; ?>">
    <style>
        .content h2 {
            color: <?php echo htmlspecialchars($headingColor); ?>;
        }
        .header-info {
            <?php echo $headerStyle; ?>
        }
        .info-section,
        .content {
            border-bottom: 1px solid <?php echo htmlspecialchars($separatorColor); ?>;
        }
        .header-info .header-name {
            color: <?php echo htmlspecialchars($nameColor); ?>;
        }                
    </style>
        
    <header class="header-info">
        <div class="header-name" contenteditable="true" data-edit="name"><?php echo htmlspecialchars($name); ?></div>
        <?php if ($avatarSrc) : ?>
            <div class="header-avatar">
                <img src="<?php echo htmlspecialchars($avatarSrc); ?>" alt="Avatar">
            </div>
        <?php elseif ($avatarError) : ?>
            <div class="header-avatar">
                <p><?php echo htmlspecialchars($avatarError); ?></p>
            </div>
        <?php endif; ?>
    </header>
    <section class="info-section">
        <div class="info-row">
            <div class="info-item">
                <span>性别:</span>
                <p contenteditable="true" data-edit="gender"><?php echo htmlspecialchars($gender); ?></p>
            </div>
            <div class="info-item">
                <span>年龄:</span>
                <p contenteditable="true" data-edit="age"><?php echo htmlspecialchars($age); ?></p>
            </div>
        </div>
        <div class="info-row">
            <div class="info-item">
                <span>学历:</span>
                <p contenteditable="true" data-edit="education"><?php echo htmlspecialchars($education); ?></p>
            </div>
            <div class="info-item">
                <span>籍贯:</span>
                <p contenteditable="true" data-edit="birthplace"><?php echo htmlspecialchars($birthplace); ?></p>
            </div>
        </div>
        <div class="info-row">
            <div class="info-item">
                <span>电话:</span>
                <p contenteditable="true" data-edit="phone"><?php echo htmlspecialchars($phone); ?></p>
            </div>
            <div class="info-item">
                <span><?php echo htmlspecialchars($emailTitle); ?>:</span>
                <p contenteditable="true" data-edit="email"><?php echo htmlspecialchars($email); ?></p>
            </div>
        </div>
    </section>
    <section class="content">
        <h2>个人介绍</h2>
        <p contenteditable="true" data-edit="introduction"><?php echo nl2br(htmlspecialchars($introduction)); ?></p>
    </section>
    <section class="content">
        <h2>教育背景</h2>
        <p contenteditable="true" data-edit="educationExperience"><?php echo nl2br(htmlspecialchars($educationExperience)); ?></p>
    </section>
    <section class="content">
        <h2>工作经历</h2>
        <p contenteditable="true" data-edit="workExperience"><?php echo nl2br(htmlspecialchars($workExperience)); ?></p>
    </section>

    <?php if (!empty($projects)) : ?>
        <section class="content">
            <h2>工作项目</h2>
            <p contenteditable="true" data-edit="projects"><?php echo nl2br(htmlspecialchars($projects)); ?></p>
        </section>
    <?php endif; ?>

    <?php if (!empty($awards)) : ?>
        <section class="content">
            <h2>获得奖项</h2>
            <p contenteditable="true" data-edit="awards"><?php echo nl2br(htmlspecialchars($awards)); ?></p>
        </section>
    <?php endif; ?>

    <?php if (!empty($evaluation)) : ?>
        <section class="content">
            <h2>自我评价</h2>
            <p contenteditable="true" data-edit="evaluation"><?php echo nl2br(htmlspecialchars($evaluation)); ?></p>
        </section>
    <?php endif; ?>

    <?php if (!empty($custom1)) : ?>
        <section class="content">
            <h2><?php echo htmlspecialchars($customTitle1); ?></h2>
            <p contenteditable="true" data-edit="custom1"><?php echo nl2br(htmlspecialchars($custom1)); ?></p>
        </section>
    <?php endif; ?>

    <?php if (!empty($custom2)) : ?>
        <section class="content">
            <h2><?php echo htmlspecialchars($customTitle2); ?></h2>
            <p contenteditable="true" data-edit="custom2"><?php echo nl2br(htmlspecialchars($custom2)); ?></p>
        </section>
    <?php endif; ?>
</div>
