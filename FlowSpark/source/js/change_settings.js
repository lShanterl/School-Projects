let acc_details = document.querySelector('.account-details');
let password = document.querySelector('.password');
let user_details = document.getElementById('ud');

const password_str = `
<h1>Change Password</h1>
<form action="update_password.php" method="post">

    <span class='value-wrap'>
        <label>Old Password</label>
        <input type="password" name="old_pass" require>
    </span>
    <span class="form-wrapper">
        <span class='value-wrap'>
            <label>New Password</label>
            <input type="password" name="new_pass" require>
        </span>
        <span class='value-wrap'>
            <label>Repeat New Password</label>
            <input type="password" name="re_new_pass" require>
        </span>
    </span>
    <div class='change'>
        <input type="submit" value="Save">
</div>
</form>`;

acc_details.addEventListener('click', () => {
    document.location.reload();
});
password.addEventListener('click', () => {
    user_details.innerHTML = password_str;
    password.className = 'active';
    acc_details.className = '';
});
