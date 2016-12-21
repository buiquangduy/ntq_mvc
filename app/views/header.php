<div class="header">
    <a class="logo" href="list-categories.html">
        <img src="./app/assets/img/logo.png" alt="NTQ Solution - Admin Control Panel" title="NTQ Solution - Admin Control Panel"/>
    </a> 
</div>

<div class="menu">

    <div class="breadLine">
        <div class="arrow"></div>
        <div class="adminControl active">
            Hi, <?php echo $_SESSION["username"] ?>
        </div>
    </div>

    <div class="admin">
        <div class="image">
            <img src="./app/assets/img/users/avatar.jpg" class="img-polaroid"/>
        </div>
        <ul class="control">
            <li><span class="icon-cog"></span> <a href="edit-user.html">Update Profile</a></li>
            <li><span class="icon-share-alt"></span> <a href="?ctr=User&action=logout">Logout</a></li>
        </ul>
    </div>

    <ul class="navigation">
        <li>
            <a href=".">
                <span class="isw-grid"></span><span class="text">Categories</span>
            </a>
        </li>
        <li>
            <a href="?ctr=Product&action=ListProduct">
                <span class="isw-list"></span><span class="text">Products</span>
            </a>
        </li>
        <li>
            <a href="?ctr=User&action=ListUser">
                <span class="isw-user"></span><span class="text">Users</span>
            </a>
        </li>
    </ul>

</div>
