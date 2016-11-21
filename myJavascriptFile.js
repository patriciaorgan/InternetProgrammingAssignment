/**
 * Patricia Organ - 01110489 - HDip Software Design and Development - CT870 - Internet Programming
 */
//Assignment4 Function: Alive Clock

    //using the event of when document fully loaded, call the setTimer method
    document.addEventListener('DOMContentLoaded', setTimer);

    //Assignment4 Function:
    //this method is used to set an interval  of 1 second to recall the current time method
    function setTimer() {
        setInterval(getTime, 1000);
        getTime();
    }//end setTimer function

    //Assignment4 Function:
    function getTime(){
        //using he built in Date method to get the current Date and time
        //then need to pull out what is needed for just the time elements
        var dt = new Date();
        var h = dt.getHours();
        var m = dt.getMinutes();
        var s = dt.getSeconds();

        //display in the div id 'clock'
        document.getElementById("clock").innerHTML = addZero(h) + ":" + addZero(m) + ":" + addZero(s)
    }//end getTime function

    //Assignment4 Function:
    //this function is created to make the time look better as hte extracted min might be 2, and we want it
    //to look like 02 and it also returns it in a string form, to be used in getTime()
    function addZero(x){
        if (x < 10) {
            return "0" + String(x);
        }
        else {
            return x;
        }
    }//end addZero function


//Assignment4 Function: Animated Banner
    //this method is used to set an Timeout  of 4 seconds to recall the getImage method
    function setImage(){
        //using setTimeout method and recursively calling itself, to loop.
        setTimeout(function(){setImage()}, 4000);
        getImage();

    }//end setImage function


    function getImage(){
        //create an array of images to use on the top Div
        var  images = ["images/carboot.png","images/car2.jpeg" ,"images/car3.jpeg"];

        //create a reference to the elements to use in remainder of code
        var imageleft = document.getElementById("imgleft");
        var imageright = document.getElementById("imgright");

        if (imageleft.getAttribute("src") === images[0]) {
            imageleft.src = images[1];
            imageright.src = images[1];
        }
        else if(imageleft.getAttribute("src") === images[1]){
            imageleft.src = images[2];
            imageright.src = images[2];
        }
        else
        {
            imageleft.src = images[0];
            imageright.src = images[0];
        }
    }//end getImage function

//Assignment4 Function: Dynamically displayed product description text
    //passed the image object so it could be used to obtain the long description
    function onHover(image){
        document.getElementById("hoovertag").innerHTML = image.getAttribute("longdesc");
    }
    function clearText(){
        document.getElementById("hoovertag").innerHTML = "";
    }

//Assignment3 Function: Client-side validation
    function validateSubmit(contactform){
        //this function is passed the form and locally calling it contactform allows for less code on HTML side
        //set up all the various checks on each input field and return false and
        //stop submission if the condition are  not met

        //creating local  variables to make the code shorter and simpler to read
        var e = contactform.email.value;
        var n = contactform.fullname.value;
        var c = contactform.comment.value;

        //this condition checks to see if any field is empty
        if ((e == "") || (n == "") || (c == "")) {
            window.alert("Error: All fields must be filled in");
            return false;
        }
        //this condition checks to see if the comments textarea is longer then 25 characters
        if (c.length <= 25) {
            window.alert("Error: Must have at least 25 characters in the Comment/question box");
            return false;
        }
        //this condition checks to see if the name field is longer then 10 characters
        if (n.length < 10) {
            window.alert("Error: You need to have at least 10 characters for a Name");
            return false;
        }

        //the code below is used to check the email validity
        //local variables set to  assist with the counting or required elements to be
        //considered a potential valid email
        var len = e.length;
        var dots = 0;
        var ats  = 0;

        //loop through the  characters in for loop
        for (var i = 0; i < len; i++) {
            //using a string variable to hold each character
            var letter = e.substr(i, 1);
            if (letter == "@") {
                //count if it finds an @ symbol
                ats++;
            }
            else if (letter == ".") {
                //count if it finds a dot
                dots++;
            }
        }
        //if the minumum conditions are not met then alert the user
        if (!(ats == 1 && dots > 0 && len >= 10)) {
            window.alert("Error: This cannot be a valid email address, you must have 1 '@', at least " +
            "one dot and minimum length of 10 characters");
            return false;
        }


        //this means all was successful, letting user know and repeating some input fields
        window.alert("Your message has been successfully sent to our Staff we will aim to get back to " +
        "you within 10 working days. \nType: " + contactform.question.value + "\nFrom - " + n + " , " + e);

        return true;

    }//end validateSubmit() function

