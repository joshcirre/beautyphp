<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php echo vite('app.css', '../css'); ?>
    <script src="https://unpkg.com/htmx.org@1.9.10"></script>
</head>

<body>
    <h1 class="text-2xl font-bold">Hi there folks.</h1>
    <!-- have a button POST a click via AJAX -->
    <button hx-post="/clicked" hx-swap="outerHTML">
        Click Me
    </button>

    
    <form hx-post="/login" hx-target="#output">
        <input type="email" name="email" placeholder="Email">
        <input type="password" name="password" placeholder="Password">
        <button type="submit">Login</button>
    </form>
    <div id="output" hx-swap="innerHTML">
    </div>
    <?php if (! ($name)): ?>
        <div class="text-red-500">
            Please fill out the form.
        </div>
    <?php endif; ?>
</body>

</html>
<?php /**PATH /Users/josh/sites/beautyphp/views/welcome.blade.php ENDPATH**/ ?>