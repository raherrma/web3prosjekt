<html>
    <head>
        <title>Admin Page</title>
    </head>
    <body>
    <div id="app">
        <div class="container admin">
           <div v-for="(post, index) in posts" :key="index" class="post">
                <img :src="post.img" alt="image"/>
                <h1>{{ post.title }}</h1>
                <h2>{{ post.subtitle }}</h1>
                <p>{{ post.content }}</p>
                <button class="btn btn-primary">Read more</button>
           </div>
           <div>
                <input type="text" name="title" placeholder="Title" v-model="form.title"/>
                <input type="text" name="title" placeholder="Subtitle" v-model="form.subtitle"/>
                <input type="text" name="title" placeholder="Image name" v-model="form.img"/>
                <input type="text" name="title" placeholder="Text / Content" v-model="form.content"/>
                <button @click="postData(form)">Lagre / opprett ny</button>
           </div>
           <br><br><br>
           <fieldset>
                <legend>Du vil se hva du skriver i inputfeltene under</legend>
                <div>Title: {{ form.title }}</div><br>
                <div>Subtitle: {{ form.subtitle }}</div><br>
                <div>Image: {{ form.img }}</div><br>
                <div>Content: {{ form.content }}</div><br>

           </fieldset>
        </div>
    </div>
    <!--I do recomend you to install this to libary with npm instead of cdn.. May use cdn as an fallback-->
    <script src="https://cdn.jsdelivr.net/npm/vue@2.5.17/dist/vue.js"></script>
    <script>
        const app = new Vue({
            el: '#app',
            data() {
                return {
                    posts: [],
                    form: {
                        title: '',
                        subtitle: '',
                        img: '',
                        content: ''
                    }
                }
            },

            mounted(){
              console.log('this works');
                this.fetchData();
            },

            methods: {
                fetchData() {
                   fetch('/api/fetch-posts')
                        .then((resp) => resp.json())
                        .then((data) => {
                            this.posts = data;
                         })
                        .catch(function(error) {
                            console.log(error);
                        });
                },

                postData(){
                    console.log(this.form);
                    fetch('/api/save-post', {
                        method: 'POST',
                        headers: {'Content-Type':'application/x-www-form-urlencoded'}, // this line is important, if this content-type is not set it wont work
                        body: this.form
                    }).then((res) => res.json())
                    .then((data) => {
                        console.log(data);
                    })
            }
            }
            })
    </script>
    </body>
</html>
