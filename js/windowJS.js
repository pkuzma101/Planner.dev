var timer = 0;
        function save() {
            console.log('Saved!');
        }
        function autosave() {
            clearTimeout(timer);
            timer = setTimeout(function() {
                save();
            }, 2000);
            
            // todo:
            // Use setTimeout and clearTimeout within this function
            // so that the save() function is called 5 seconds after
            // the last key up event. If a new key up event occurs,
            // you need to cancel the existing timer and set a new one.
        }
        // don't modify the line below
        // this causes the autosave function to be called whenever
        // a key up event occurs in the textarea
        // we will learn about events in the DOM lessons
        // var textarea = document.getElementById('important');
        $(document).ready(function() {
            $('#important').keyup(function() {
                autosave();

            });
        });
        // textarea.addEventListener('keyup', autosave, false);