<?php
function onSuccess() {
	echo "{ \"response_code\": 1 }";
}

function onSuccessAdded($newId) {
	echo "{ \"response_code\": 1, \"new_id\": $newId }";
}

function onError($errorCode) {
	echo "{ \"response_code\": 0,  \"error_code\": $errorCode }";
}
?>