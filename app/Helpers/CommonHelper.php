<?php
function moneyFormat($value) {
    return number_format($value, 0, ',', '.') . ' VNĐ';
}
