function form_validate() {
    let psw1 = document.forms['registerForm']['password_1'].value;
    let psw2 = document.forms['registerForm']['password_2'].value;
    console.log(psw1, psw2)
    if (psw1 === psw2) {
        return true;
    } else {
        alert('Le password devono coincidere');
        return false;
    }
}

function onSelectChange(value) {
    // console.log(value);
    const div = $('div.badge-div');
    div.empty();
    if (value === 'employee') {

        let template = `  
            <div class="form-floating">
                <input
                        type="text"
                        class="form-control"
                        id="badge"
                        placeholder="Badge"
                        name="badge"
                        required
                />
                <label for="badge">Badge</label>
            </div>`;
        div.append(template);
    } else {
        div.empty();
    }
}

$(document).ready(function () {
    $("div.badge-div select").val("user").change();
});

// Vue.component('badge', {
//         template: `
//           <div class="form-floating">
//           <input
//               type="password"
//               class="form-control"
//               id="password"
//               placeholder="Password"
//               name="password"
//               required
//           />
//           <label for="password">Password</label>
//           </div>`,
//         data() {
//             return {
//                 showdetails: false
//             }
//         },
//     }
// )
//
// new Vue({
//     el: '#badge-div',
//
// })

