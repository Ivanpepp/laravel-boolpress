<template>
    <div class="card mb-5 shadow-lg">
        <div class="card-header ">
            <h3>{{post.title}}</h3>
        </div>
        <div class="card-body">
            <blockquote class="blockquote mb-0">
                <p>
                    {{post.content}}
                </p>
                <footer class="blockquote-footer">
                    Sritto da:  <cite title="Source Title ">{{post.author}}</cite>
                    il <time>{{post.date}}</time>
                </footer>
            </blockquote>
        </div>
</div>
</template>

<script>
export default {
    name: 'PostCard',
    props:['post']
}
</script>

<style>

</style>