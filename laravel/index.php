composer create-project --prefer-dist laravel/laravel:^7.0 demo 


## add basic authentication with curl

use Illuminate\Support\Facades\Http;


$response = Http::withHeaders([
        'Authorization' => 'Basic '. base64_encode("j7bFF1wFHpe1H05d:9VxIN0Xijs2gkLbsJ8efOzBxevcXE7vBSR7tFUAPdsVn3UDASFDv45S6oSRSNbhw"),
    ])->get('https://api.patientsites.com/socmedfeedsapi.php', [
        'action' => 'get_vars',
    ]);



