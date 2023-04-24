/*!
 * Start Bootstrap - SB Admin v7.0.5 (https://startbootstrap.com/template/sb-admin)
 * Copyright 2013-2022 Start Bootstrap
 * Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-sb-admin/blob/master/LICENSE)
 */
//
// Scripts
//

window.addEventListener("DOMContentLoaded", (event) => {
    // Toggle the side navigation
    const sidebarToggle = document.body.querySelector("#sidebarToggle");
    let shouldExecuteCode = false; // variable to keep track of whether the code should be executed or not
    if (sidebarToggle) {
        // Uncomment Below to persist sidebar toggle between refreshes
        // if (localStorage.getItem("sb|sidebar-toggle") === "true") {
        //     document.body.classList.toggle("sb-sidenav-toggled");
        // }
        sidebarToggle.addEventListener("click", (event) => {
            event.preventDefault();
            document.body.classList.toggle("sb-sidenav-toggled");
            localStorage.setItem(
                "sb|sidebar-toggle",
                document.body.classList.contains("sb-sidenav-toggled")
            );

            // Toggle the code that removes "d-flex" class and adds "d-none" class on the "invoiceApp" div
            shouldExecuteCode = !shouldExecuteCode;
            var windowWidth = $(window).width();
            const invoiceApp = document.getElementById("invoiceApp");
            const sideTitle = document.getElementById("sideTitle");

            let sideWidth = $(
                ".sb-sidenav-toggled #layoutSidenav #layoutSidenav_nav"
            ).width();

            console.log("width", windowWidth);
            console.log("side", sideWidth);

            if (windowWidth <= 768) {
                invoiceApp.classList.add("d-none");
                sideTitle.classList.add("d-flex");
            } else {
                sideTitle.classList.add("d-none");

                if (shouldExecuteCode) {
                    console.log("OPEN");

                    invoiceApp.classList.remove("d-flex");
                    invoiceApp.classList.add("d-none");
                } else {
                    console.log("CLOSE");

                    if (windowWidth >= 768) {
                        // $("#layoutSidenav_nav").css("width", "50px");
                        console.log("SIDEWIDTH", sideWidth);
                    }

                    invoiceApp.classList.remove("d-none");
                    invoiceApp.classList.add("d-flex");
                }
            }

            // let sideWidth = $(
            //     ".sb-sidenav-toggled #layoutSidenav #layoutSidenav_nav"
            // ).width();
            // if (windowWidth >= 769) {
            //     console.log(">769");
            //     $(".sb-sidenav-toggled #layoutSidenav #layoutSidenav_nav").css(
            //         "width",
            //         "50px"
            //     );
            //     if (sideWidth == "50px") {
            //         console.log("sideWidth", sideWidth);

            //         $(".labelText").addClass("d-none");
            //         $("#admindashboard").click(function (event) {
            //             event.preventDefault();
            //         });
            //         $("#settingsdeductiontype").click(function (event) {
            //             event.preventDefault();
            //         });
            //         $("#collapseLayouts").addClass("d-none");
            //         $("#collapseLayouts2").addClass("d-none");
            //         $("#collapseLayouts3").addClass("d-none");
            //         $("#collapseLayouts4").addClass("d-none");
            //     } else {
            //         $(".labelText").removeClass("d-none");
            //         $("#admindashboard").off("click");
            //         $("#settingsdeductiontype").off("click");
            //         $("#admindashboard").removeClass("disabled");
            //         $("#collapseLayouts").removeClass("d-none");
            //         $("#collapseLayouts2").removeClass("d-none");
            //         $("#collapseLayouts3").removeClass("d-none");
            //         $("#collapseLayouts4").removeClass("d-none");
            //     }
            // } else if (windowWidth >= 320 && windowWidth <= 768) {
            //     console.log("sideWidth", sideWidth);

            //     console.log("<769");
            //     $(".sb-sidenav-toggled #layoutSidenav #layoutSidenav_nav").css(
            //         "width",
            //         "225px"
            //     );
            //     $(".labelText").removeClass("d-none");
            //     $("#admindashboard").off("click");
            //     $("#settingsdeductiontype").off("click");
            //     $("#admindashboard").removeClass("disabled");
            //     $("#collapseLayouts").removeClass("d-none");
            //     $("#collapseLayouts2").removeClass("d-none");
            //     $("#collapseLayouts3").removeClass("d-none");
            //     $("#collapseLayouts4").removeClass("d-none");
            // }
        });
    }
});

let apiUrl = window.location.origin;
let token = localStorage.token ? "Bearer " + localStorage.token : null;

// post normal
// let datanormal = { data1: "value1", data2: "value2", data3: "value3" };
// axios
//     .post(apiUrl + "/api/login", datanormal, {
//         headers: {
//             Authorization: token,
//         },
//     })
//     .then(function (response) {
//         console.log("then", response);
//         let data = response.data;
//         if (data.succcess) {
//             console.alert('success');
//         } else {
//             console.alert('error');
//         }
//     })
//     .catch(function (error) {
//         console.log("catch", error);
//     });

// post with picture

// let datawithpicture = new FormData();

// let picture = document.getElementById("picture").files[0];

// datawithpicture.append("data1", "value1");
// datawithpicture.append("data2", "value2");
// datawithpicture.append("picture", picture, "picture.png");
// datawithpicture.append("data3", "value3");

// axios
//     .post(apiUrl + "/api/login", datawithpicture, {
//         headers: {
//             Authorization: token,
//             "Content-Type": "multipart/form-data",
//         },
//     })
//     .then(function (response) {
//         console.log("then", response);

//         let data = response.data;
//         if (data.succcess) {
//             console.alert('success');
//         } else {
//             console.alert('error');
//         }
//     })
//     .catch(function (error) {
//         console.log("catch", error);
//     });

// update
// let dataupdate = {};
// axios
//     .put(`${apiUrl}${url}/id`, dataupdate, {
//         headers: {
//             Authorization: token,
//         },
//     })
//     .then(function (response) {
//         console.log("then", response);

//         let data = response.data;
//         if (data.succcess) {
//             console.alert("success");
//         } else {
//             console.alert("error");
//         }
//     })
//     .catch(function (error) {
//         console.log("catch", error);
//     });

// delete
// axios
//     .delete(`${apiUrl}${url}/id`, {
//         headers: {
//             Authorization: token,
//         },
//     })
//     .then(function (response) {
//         console.log("then", response);

//         let data = response.data;
//         if (data.succcess) {
//             console.alert("success");
//         } else {
//             console.alert("error");
//         }
//     })
//     .catch(function (error) {
//         console.log("catch", error);
//     });

// get
// axios
//     .get(`${apiUrl}${url}/id`, {
//         headers: {
//             Authorization: token,
//         },
//     })
//     .then(function (response) {
//         console.log("then", response);

//         let data = response.data;
//         if (data.succcess) {
//             console.alert("success");
//         } else {
//             console.alert("error");
//         }
//     })
//     .catch(function (error) {
//         console.log("catch", error);
//     });
