/**
* Shows a Swal alert to input admin password and check if it is correct
* @return  {boolean} return true if admin password is correct, else false
*/
export async function verifyAdmin() {
    try {
        const result = await Swal.fire({
            title: 'Verify Admin Password',
            text: 'This action requires an admin permission. Enter an admin password first.',
            inputAttributes: {
                autocapitalize: 'off',
                placeholder: 'Enter admin Password'
            },
            input: 'password',
            showCancelButton: true,
            confirmButtonText: 'Verify Admin',
            showLoaderOnConfirm: true,
            preConfirm: (password) => {
                return fetch('/Zarate/API/admin/verify.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({ password: password })
                })
                    .then(response => {
                        if (!response.ok) {
                            console.log(response, password);
                            throw new Error(response.text);
                        }
                        return response.json();
                    })
                    .catch(error => {
                        Swal.showValidationMessage(
                            `Invalid Admin Password`
                        );
                    });
            },
            allowOutsideClick: false
        });

        if (result.isConfirmed) {
            console.log("Verifying Admin: ", result);
            return true;
        } else {
            return false;
        }
    } catch (error) {
        console.error(error);
        return false;
    }
}