<?php
/**
 * Created by PhpStorm.
 * User: Yuvraj
 * Date: 2/27/2015
 * Time: 10:49 PM
 */
//header('Content-Type: application/json');
/*if(isset($_POST)){
    print_r($_POST);
} else {

}*/

echo '{
    "result": true,
    "errorCode": 200,
    "errorDescription": "",
    "rewardPartnerData": {
        "__v": 0,
        "partnerType": 1,
        "_id": "54ce6d5dc635a5f80ce2388d",
        "metadata": {
            "modified": "2015-02-01T18:15:57.094Z",
            "created": "2015-02-01T18:15:57.100Z"
        },
        "category": [
            "54cd4c51f2a8964c0ff3a44d"
        ],
        "rewardCollection": [
        ],
        "isVerified": false,
        "isDeleted": false,
        "contactNo": "",
        "location": {
            "area": "5468f1347ee4b49841f60efa",
            "city": "5468f0d57ee4b49841f60ef9"
        },
        "logo": "",
        "name": "A-One"
    },
    "rewardPartnerUserData": {
        "__v": 0,
        "userType": 2,
        "hash": null,
        "salt": null,
        "emailId": "admin@aone.com",
        "_id": "54ce6d5ec635a5f80ce2388e",
        "metadata": {
            "modified": "2015-02-01T18:15:58.446Z",
            "created": "2015-02-01T18:15:58.447Z"
        },
        "authToken": "",
        "isDeleted": false,
        "rewardPartnerCollection": [
            "54ce6d5dc635a5f80ce2388d"
        ],
        "verificationCode": null,
        "isVerified": true,
        "contactNo": "",
        "gender": "Male",
        "lastName": "Aghera",
        "firstName": "Ravindra",
        "profilePic": ""
    }
}';
