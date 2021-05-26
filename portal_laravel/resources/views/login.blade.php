

<body>
    <div class="outer_container">
        <div class="header_and_content">
            <?php include('./partials/logged_out_header.php') ?>  
            
            <div class="content">
                <div class="info">
                    <h3>Log in</h3>
                        <form autocomplete="off" method="post">
                            <ul>
                                <li>
                                    <label for="email">E-mail:</label><br>
                                    <input type="text" id="email" name="email" >
                                </li>
                                    
                                <li>
                                    <label for="password">Password:</label><br>
                                    <input type="password" id="password" name="password"  >
                                </li>

                                <li style="display:flex;flex-direction: column;">
                                    <button id="submit" name="submit">Submit</button>
                                </li>
                                    
                            </ul>
                        </form>
                        <div class="errors_wrapper">
                            <p class="errors"></p>
                        </div>
                </div>
            </div>
                
        </div>
    </div>
    <?php include('./partials/footer.php')?>
</body>
</html>