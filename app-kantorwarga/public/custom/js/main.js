(function ($) {
    "use strict";


    /*==================================================================
    [ Focus input ]*/
    $('.input100').each(function () {
        $(this).on('blur', function () {
            if ($(this).val().trim() != "") {
                $(this).addClass('has-val');
            } else {
                $(this).removeClass('has-val');
            }
        })
    })


    /*==================================================================
    [ Validate ]*/
    var input = $('.validate-input .input100');

    $('.validate-form').on('submit', function () {
        var check = true;

        for (var i = 0; i < input.length; i++) {
            if (validate(input[i]) == false) {
                showValidate(input[i]);
                check = false;
            }
        }

        return check;
    });


    $('.validate-form .input100').each(function () {
        $(this).focus(function () {
            hideValidate(this);
        });
    });

    function validate(input) {
        if ($(input).attr('type') == 'email' || $(input).attr('name') == 'email') {
            if ($(input).val().trim().match(/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{1,5}|[0-9]{1,3})(\]?)$/) == null) {
                return false;
            }
        } else {
            if ($(input).val().trim() == '') {
                return false;
            }
        }
    }

    function showValidate(input) {
        var thisAlert = $(input).parent();

        $(thisAlert).addClass('alert-validate');
    }

    function hideValidate(input) {
        var thisAlert = $(input).parent();

        $(thisAlert).removeClass('alert-validate');
    }

    /*==================================================================
    [ Show pass ]*/
    var showPass = 0;
    $('.btn-show-pass').on('click', function () {
        if (showPass == 0) {
            $(this).next('input').attr('type', 'text');
            $(this).addClass('active');
            showPass = 1;
        } else {
            $(this).next('input').attr('type', 'password');
            $(this).removeClass('active');
            showPass = 0;
        }

    });


})(jQuery);

//search function
//first
function searchTable() {
    var input;
    var saring;
    var status;
    var tbody;
    var tr;
    var td;
    var i;
    var j;
    var text = "tidak ada data";
    input = document.getElementById("input");
    saring = input.value.toUpperCase();
    tbody = document.getElementsByTagName("tbody")[0];;
    tr = tbody.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td");
        for (j = 0; j < td.length; j++) {
            if (td[j].innerHTML.toUpperCase().indexOf(saring) > -1) {
                status = true;
            }
        }
        if (status) {
            tr[i].style.display = "";
            status = false;
        } else {
            tr.innerText = text;
            tr[i].style.display = "none";

        }
    }
}

//second
$('select').change(function (e) {
    var letter = $(this).val();
    if (letter === "0") {
        $('tr').show();
    } else {
        $('tr').each(function (rowIdx, tr) {
            $(this).hide().find('td').each(function (idx, td) {
                if (idx === 0 || idx === 1) {
                    var check = $(this).text();
                    if (check && check.indexOf(letter) == 0) {
                        $(tr).show();
                    }
                }
            });

        });
    }
});

//toast notif
//select required element

const connectDetect = document.querySelector(".connection-detect"),
    toast = connectDetect.querySelector(".toast"),
    wifiIcon = connectDetect.querySelector(".icon"),
    title = connectDetect.querySelector("span"),
    subTitle = connectDetect.querySelector("p"),
    closeIcon = connectDetect.querySelector(".close-icon");

window.onload = () => {
    function ajax() {
        let xhr = new XMLHttpRequest(); //create xml object
        xhr.open("GET", "https://jsonplaceholder.typicode.com/posts", true); //sending request
        xhr.onload = () => {
            if (xhr.status == 200 && xhr.status < 300) {
                toast.classList.remove("offline");
                wifiIcon.classList.remove("offline");
                title.innerText = "Kamu Online !";
                subTitle.innerText = "Kamu berhasil terkoneksi.";
                wifiIcon.innerHTML = '<i class="fas fa-wifi"></i>';

                closeIcon.onclick = () => {
                    connectDetect.classList.add("hide");
                }

                setTimeout(() => {
                    connectDetect.classList.add("hide");
                }, 3000)


            } else {
                offline();
            }
        }
        xhr.onerror = () => {
            offline();
        }
        xhr.send();
    }


    //function adding toast notif
    function offline() {
        toast.classList.add("offline");
        wifiIcon.classList.add("offline");
        title.innerText = "Kamu Offline !";
        subTitle.innerText = "Kamu gagal terhubung.";
        wifiIcon.innerHTML = '<i class="fas fa-exclamation-triangle"></i>';

        closeIcon.onclick = () => {
            connectDetect.classList.add("hide");
        }

        setInterval(() => {
            connectDetect.classList.add("hide");
        }, 3000)

    }

    //intervaling ajax time
    setInterval(() => {
        ajax();
    }, 100);
};
