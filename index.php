<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog API</title>
</head>
<body>
    <h1>Create New Post</h1>
    <br>
    <form id="post-form" method="POST" action="create_post.php">
        <label for="username">Username:</label>
        <br>
        <input type="text" id="username" name="username">
        <br>
        <label for="content">Content:</label>
        <br>
        <textarea id="content" name="content"></textarea>
        <br>
        <input type="submit" value="Create Post">
    </form>
</body>
</html>