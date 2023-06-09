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

            const ulAdminDashboard =
                document.querySelector(".nav-link") || null;
            const ulDashboard = document.getElementById("dashboard") || null;

            const ulUserSOA = document.querySelector(".nav-link") || null;
            const ulSOA = document.getElementById("statmentOfAcct") || null;

            const ulsettingsdeductiontype =
                document.querySelector(".nav-link") || null;
            const ulDeductions = document.getElementById("deductions") || null;

            const ulUserDashboard = document.querySelector(".nav-link") || null;
            const ulUDashboard =
                document.getElementById("dashboarduser") || null;

            const uluseruserdeductiontype =
                document.querySelector(".nav-link") || null;
            const uluserdeduction =
                document.getElementById("udeduction") || null;

            let sideWidth = $(
                ".sb-sidenav-toggled #layoutSidenav #layoutSidenav_nav"
            ).width();

            if (windowWidth < 768) {
                invoiceApp.classList.add("d-none");
                sideTitle.classList.add("d-flex");
            } else {
                sideTitle.classList.add("d-none");

                if (shouldExecuteCode) {
                    console.log("CLOSE");
                    if (ulDashboard) {
                        ulAdminDashboard.classList.remove("collapsed");
                        ulDashboard.classList.remove("d-none");
                        $("a#admindashboard").removeAttr(
                            "data-bs-toggle data-bs-target"
                        );
                    }

                    if (ulSOA) {
                        ulUserSOA.classList.remove("collapsed");
                        ulSOA.classList.remove("d-none");
                        $("a#usersoa").removeAttr(
                            "data-bs-toggle data-bs-target"
                        );
                    }

                    if (ulDeductions) {
                        ulsettingsdeductiontype.classList.remove("collapsed");
                        ulDeductions.classList.remove("d-none");
                        $("a#settingsdeductiontype").removeAttr(
                            "data-bs-toggle data-bs-target"
                        );
                    }

                    if (ulUDashboard) {
                        ulUserDashboard.classList.remove("collapsed");
                        ulUDashboard.classList.remove("d-none");
                        $("a#userdashboard").removeAttr(
                            "data-bs-toggle data-bs-target"
                        );
                    }

                    if (uluserdeduction) {
                        uluseruserdeductiontype.classList.remove("collapsed");
                        uluserdeduction.classList.remove("d-none");
                        $("a#useruserdeductiontype").removeAttr(
                            "data-bs-toggle data-bs-target"
                        );
                    }
                } else {
                    console.log("OPEN");
                    if (ulDashboard) {
                        ulDashboard.classList.add("d-none");
                        $("a#admindashboard").removeAttr(
                            "data-bs-toggle data-bs-target"
                        );
                    }

                    if (ulSOA) {
                        ulSOA.classList.add("d-none");
                        $("a#usersoa").removeAttr(
                            "data-bs-toggle data-bs-target"
                        );
                    }

                    if (ulDeductions) {
                        ulDeductions.classList.add("d-none");
                        $("a#settingsdeductiontype").removeAttr(
                            "data-bs-toggle data-bs-target"
                        );
                    }
                    if (ulUDashboard) {
                        ulUDashboard.classList.add("d-none");
                        $("a#userdashboard").removeAttr(
                            "data-bs-toggle data-bs-target"
                        );
                    }
                    if (uluserdeduction) {
                        uluserdeduction.classList.add("d-none");
                        $("a#useruserdeductiontype").removeAttr(
                            "data-bs-toggle data-bs-target"
                        );
                    }
                }
                invoiceApp.classList.remove("d-none");
                invoiceApp.classList.add("d-flex");
            }
        });
    }
});
let width = window.innerWidth; // Set the initial value of width
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
