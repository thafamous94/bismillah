<?php
/**
 * Project: kriteria.
 * @author Adryan Eka Vandra <adryanekavandra@gmail.com>
 *
 * Date: 11/4/2019
 * Time: 9:24 AM
 */

namespace common\helpers\kriteria9;


interface IK9JsonHelper
{

    public static function getAllJsonLk();

    public static function getJsonKriteriaLk(int $kriteria);

    public static function getAllJsonLed();

    public static function getJsonKriteriaLed(int $kriteria);

    static function getJson($tipe);
}