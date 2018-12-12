<?php
  session_start();
    if(!isset($_SESSION['login'])) {
        header('LOCATION:index.php'); die();
    }
?>
<html>
    <head>
        <title>Admin Page</title>
        <link rel="stylesheet" type="text/css" href="../../style.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </head>
  <body>
    <div id="app">
        <div>
           <div v-for="(post, index) in posts" :key="index">
             <div class="container text-center blog-container">
               <div class="row">
                 <div class="col">
                   <img class="img-thumbnail img-blog" :src="post.img" alt="image"/>
                    <br>
                    <br>
                      <h3 class="title">{{ post.title }}</h1>
                      <h5 class="subtitle">{{ post.subtitle }}</h1>
                      <br>
                      <div class="collapse" id='collapseExample1'>
                        <div class="card card-body my-card">
                            <p id="thearticle">{{ post.content }}</p>
                        </div>
                      </div>
                      <p>Post ID: {{ post.id }}</p>
                      <p>Published: {{ post.published }}</p>
                      <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample1" aria-expanded="false" aria-controls="collapseExample1">
                        Read more
                      </button>
                  </div>
                </div>
              </div>
           </div>
        </div>
    </div>
    <!--I do recomend you to install this to libary with npm instead of cdn.. May use cdn as an fallback-->
    <script src="https://cdn.jsdelivr.net/npm/vue@2.5.17/dist/vue.js"></script>
    <script>
        const app = new Vue({
            el: '#app',
            data() {
                return {
                    posts: []
                }
            },

            mounted(){
              console.log('this works');
                this.fetchData();
            },

            methods: {
                fetchData() {
                   fetch('http://web3.test/root/pages/ny/api/post.php')
                        .then((resp) => resp.json())
                        .then((data) => {
                            this.posts = data;
                            console.log(data);
                         })
                        .catch(function(error) {
                            console.log(error);
                        });
                }
            }
        })
    </script>
  </body>
</html>
