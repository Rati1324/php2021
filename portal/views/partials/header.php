<style>
    header{
        display: flex;
        flex-direction: row;
        width:100%;
        /* height: 9%; */
        background-color: rgb(238, 231, 231);
        align-items: center;
        justify-content: center;
    }
    .filler{
        width: 10%;
    }
    header h2 {
        width:85%;
        text-align: center;
    }
    .logout{
        outline:none;
        width: 10%;
        text-align: center;
    }   

    .logout_button{
        background-color: Transparent;
        background-repeat:no-repeat;
        border: none;
        cursor:pointer;
        overflow: hidden;
    }
    a{
        color: black;
        text-decoration: none;
        text-align: center;
    }
</style>
    
<header>
    <a href="" class="filler"> Contact </a> 
    <h2>Student Portal</h2>
    <?php if (isset($_SESSION['email'])){ ?>
        <form action="../views/login.php" method="post" class="logout">
            <button class="logout_button" name="logout"> Log Out </button>
        </form>
    <?php } else { ?>
        <a href=""> About </a>
    <?php }?>
</header>

    <!-- <div class="logout">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"/>
            <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
        </svg>
    </div> -->
</header>