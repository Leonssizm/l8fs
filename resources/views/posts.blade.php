<!DOCTYPE html>
<title>My blog</title>
<link rel="stylesheet" href="/app.css">
<body>
    
    <?php foreach($posts as $post) : ?>
        <article>
            <?= $post; ?>
        </article>
    <?php endforeach; ?>
    <!-- <article>
        <h1> <a href="/posts/my-first-post">My First Post</a></h1>
        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Cumque aspernatur, sint voluptatum necessitatibus quis possimus nobis quo aliquid? Nulla rem praesentium natus quisquam repudiandae, harum sapiente facere ratione non omnis.</p>
    </article>

    <article>
        <h1><a href="/posts/my-second-post">My Second Post</a></h1>
        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Cumque aspernatur, sint voluptatum necessitatibus quis possimus nobis quo aliquid? Nulla rem praesentium natus quisquam repudiandae, harum sapiente facere ratione non omnis.</p>
    </article>

    <article>
        <h1><a href="/posts/my-third-post">My Third Post</a></h1>
        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Cumque aspernatur, sint voluptatum necessitatibus quis possimus nobis quo aliquid? Nulla rem praesentium natus quisquam repudiandae, harum sapiente facere ratione non omnis.</p>
    </article> -->
</body>