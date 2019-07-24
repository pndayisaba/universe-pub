<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>Universe</title>
    <link href="/css/style.css" rel="stylesheet" type="text/css" />
  </head>
  <body>
    <div id="wrapper">
      <nav id="nav-wrap">
        <ul id="navigation" class="container">
          <li><a href="/">Home</a></li>
          <li><a href="/login">Login</a></li>
        </ul>
      </nav>
    <div id="content"><?=Universe\RR::app()->view->output()?></div>  
      <footer id="footer">
        <ul id="navigation" class="container">
          <li><a href="/">Home</a></li>
        </ul>
      </footer>  
    </div>
  </body>
</html>