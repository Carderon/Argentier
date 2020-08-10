<template>
    <div class="">
        <h2>OCR test</h2>
        <button @click="recognize">recognize</button>
        <figure>
            <img id="text-img" alt="Vue logo" class="img" src="http://localhost:3000/images/testticket.jpg">
        </figure>
        <div>
            <p>Work type : {{ worktype }} ({{ (workprogress*100).toFixed(2) }}%)</p>
        </div>
        <h3>Le text</h3>
        <div>
            <p v-for="line in text.split('\n')">
                {{ line }}
            </p>
        </div>
    </div>
</template>
<script>
    import Tesseract from 'tesseract.js';

    export default {
        data(){
            return {
                text: "",
                worktype: "none",
                workprogress: 0,
            }
        },
        methods: {
          recognize() {
            Tesseract.recognize(
                document.getElementById('text-img'),
                'fra',
                {
                    logger: m => {
                        this.worktype = m.status;
                        this.workprogress = m.progress;
                        console.warn(m);
                    }
                }
            ).then(({ data: { text } }) => {
                console.log(text);
                this.text = text;
            })
          }
        }

    }
</script>

<style>
    #text-img {
        width: 600px;
        margin: 0 auto;
    }
</style>
