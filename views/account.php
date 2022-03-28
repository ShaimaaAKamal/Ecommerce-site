<?php
include_once "layouts/header.php";
include_once "layouts/nav.php";
?>


<section id="form">
    <!--form-->
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-4">
            <div class='text-center mt-3 h3'><?= ucfirst($_SESSION['user']->name); ?></div>
            <?= isset($_SESSION['success']) ? $_SESSION['success'] : "" ?>
                <div class='text-center mt-3'>
                    <img class='rounded-circle' src='../assests/images/users/<?= ($_SESSION['user']->image); ?>' width='50%'>
                    <?= isset($_SESSION['errors']['image']['size']) ? $_SESSION['errors']['image']['size'] : "" ?>
                <?= isset($_SESSION['errors']['image']['type']) ? $_SESSION['errors']['image']['type'] : "" ?>
                </div>
                <form method='POST' action='../routes/route.php' class='mt-3 login-form' enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="example">UPload image</label>
                        <input type="file" class="form-control-file" id="example" name='image'>
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="input" class="form-control" id="username" name='name' value="<?= isset($_SESSION['user']->name) ? $_SESSION['user']->name: ''; ?>">
                </div>
                <?= isset($_SESSION['errors']['name']) ? $_SESSION['errors']['name'] : "" ?>

                <div class=" form-group">
                        <label for="exampleFormControlInput1">Email address</label>
                        <input type="email" class="form-control" id="exampleFormControlInput1" name="email"  value="<?= isset($_SESSION['user']->email) ? $_SESSION['user']->email: ''; ?>">
                    </div>
                    <?php if(isset($_SESSION['errors']['email'])){
                        foreach($_SESSION['errors']['email'] as $key=>$value)
                        {
                            echo $value;
                        }
                    }
                    
              ?>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Gender</label>
                        <select class="form-control" id="exampleFormControlSelect1" name='gender'>
                            <option value="m" <?= (isset($_SESSION['user']->gender) and  $_SESSION['user']->gender == 'm') ? 'selected' : ''; ?>>male</option>
                            <option value="f" <?= (isset($_SESSION['user']->gender) and  $_SESSION['user']->gender == 'f') ? 'selected' : ''; ?>>female</option>
                        </select>
                        <?= isset($_SESSION['errors']['gender']) ? $_SESSION['errors']['gender'] : "" ?>
                    </div>
                    <button type="submit" name='update' class="btn btn-primary">Update</button>
                </form>
            </div>
            <div>
</section>
<?php
include_once "layouts/footer.php";
include_once "layouts/foot.php";
?>