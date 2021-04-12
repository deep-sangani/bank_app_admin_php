var submitform = document.getElementById("submitform")

// submitform.addEventListener("submit", (e) => {
//     e.preventDefault()
//     // var data = {}
//     // var formdata = new FormData(e.target)
//     // formdata.forEach((value, key) => {
//     //     data[key] = value
//     // }

//     // .then((res) => {
//     //     console.log(res.data)
//     //     const alartbox = document.getElementById("alartbox");
//     //     const alartmsg = document.getElementById("alartmsg");
//     //     alartbox.style.display = "flex"
//     //     alartmsg.innerText = res.data
//     // }).catch((e) => { console.log(e) })


// })



function inputValidate (form) {

    var empid = form.empid.value;
    var pass = form.pass.value;
    var err = []
    var empidrgx = '/^[a-z]$/';
    if (empid == "" || empid.length < 3) {
        err.push("please enter valid empid....")
    }
    if (pass == "" || pass.length < 5) {
        err.push("please enter valid password....")
    }

    if (err.length > 0) {
        var errmsg = document.getElementById("alartbox")
        errmsg.style.display = "flex"
        errmsg.innerHTML = `
         <strong class="font-bold" id="alartmsg">${err[0] ? err[0] : ""}</br>${err[1] ? err[1] : ""}</strong>
                    <span class="block sm:inline"></span>
                    <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                    </span>
        `
        err = []
        // alert(err)
        return false
    } else {
        return true;
    }









}
