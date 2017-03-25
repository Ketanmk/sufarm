<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 28/02/17
 * Time: 09:17 م
 */

if (!function_exists("customUploadFile")) {

    /**
     * Custom upload function that you send to it the file name in the request like "photo"
     * Also you will specify the folder like "tempWork" or "tqawel"
     * This function will find or create upload folder for the current month then make upload inside it
     *
     * @param $fileAttr
     * @param $path
     *
     * @return string $filePath
     */
    function customUploadFile($fileAttr, $path = "userDocuments")
    {
        $upload_dir = '/uploads/';
        $folder_path = $path . '/' . date('m') . '_' . date('y');

        if (request()->file($fileAttr)->isValid()) {
            if (!file_exists(public_path($upload_dir . $folder_path))) {
                mkdir(public_path($upload_dir . $folder_path), 0777, true);
            }

            $file = request()->file($fileAttr);
            $name = $file->getClientOriginalName();
            $name = time() . '_' . $name;
            $file->move(public_path($upload_dir . $folder_path), $name);

            return $folder_path . '/' . $name;
        }

        return false;
    }
}
