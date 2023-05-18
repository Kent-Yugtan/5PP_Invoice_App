//declearing html elements
// ADMIN/AdminProfile
const admin_imgDiv = document.querySelector(
    ".profile-pic-div_superadminProfile"
);
const admin_img = document.querySelector("#admin_image_demo")
    ? document.querySelector("#admin_image_demo")
    : "";
// const img = document.querySelector("#photo")
//     ? document.querySelector("#photo")
//     : "";
// const file = document.querySelector("#file")
//     ? document.querySelector("#file")
//     : "";

const admin_uploadBtn = document.querySelector("#admin_uploadBtn")
    ? document.querySelector("#admin_uploadBtn")
    : "";

//if user hover on img div
admin_imgDiv.addEventListener("mouseenter", function () {
    admin_uploadBtn.style.display = "block";
});

//if we hover out from img div
admin_imgDiv.addEventListener("mouseleave", function () {
    admin_uploadBtn.style.display = "none";
});

if (window.matchMedia("(any-pointer: coarse)").matches) {
    admin_uploadBtn.style.display = "block";
}
//lets work for image showing functionality when we choose an image to upload
//when we choose a foto to upload
// file.addEventListener("change", function () {
//     //this refers to file
//     const choosedFile = this.files[0];
//     if (choosedFile) {
//         const reader = new FileReader(); //FileReader is a predefined function of JS
//         reader.addEventListener("load", function () {
//             img.setAttribute("src", reader.result);
//         });
//         reader.readAsDataURL(choosedFile);
//         //Allright is done
//         //please like the video
//         //comment if have any issue related to vide & also rate my work in comment section
//         //And aslo please subscribe for more tutorial like this
//         //thanks for watching
//     }
// });
