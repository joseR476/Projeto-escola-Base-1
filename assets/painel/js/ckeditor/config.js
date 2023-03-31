/**
 * @license Copyright (c) 2003-2019, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */
//import HOME from "../../../admin/js/modules/root.js";

CKEDITOR.editorConfig = function(config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
    config.extraPlugins = 'youtube';
    config.youtube_width = '640';
    config.youtube_height = '480';
    config.youtube_responsive = true;
    config.youtube_related = true;
    config.youtube_older = false;
    config.youtube_privacy = false;
    config.youtube_privacy = false;
    config.youtube_controls = true;
    config.youtube_disabled_fields = ['txtEmbed', 'chkAutoplay'];

    /*
    config.filebrowserBrowseUrl = '../kcfinder/browse.php?opener=ckeditor&type=files';
    config.filebrowserImageBrowseUrl = '../kcfinder/browse.php?opener=ckeditor&type=images';
    config.filebrowserFlashBrowseUrl = '../kcfinder/browse.php?opener=ckeditor&type=flash';
    config.filebrowserUploadUrl = '../kcfinder/upload.php?opener=ckeditor&type=files';
    config.filebrowserImageUploadUrl = '../kcfinder/upload.php?opener=ckeditor&type=images';
    config.filebrowserFlashUploadUrl = '../kcfinder/upload.php?opener=ckeditor&type=flash';
    */

    /*
    config.filebrowserBrowseUrl = HOME()+'/painel/kcfinder/browse.php?opener=ckeditor&type=files';
    config.filebrowserImageBrowseUrl = HOME()+'/painel/kcfinder/browse.php?opener=ckeditor&type=images';
    config.filebrowserFlashBrowseUrl = HOME()+'/painel/kcfinder/browse.php?opener=ckeditor&type=flash';
    config.filebrowserUploadUrl = HOME()+'/painel/kcfinder/upload.php?opener=ckeditor&type=files';
    config.filebrowserImageUploadUrl = HOME()+'/painel/kcfinder/upload.php?opener=ckeditor&type=images';
    config.filebrowserFlashUploadUrl = HOME()+'/painel/kcfinder/upload.php?opener=ckeditor&type=flash';

     */

    config.extraPlugins = 'wordcount,notification';

    config.wordcount = {

        // Whether or not you want to show the Paragraphs Count
        showParagraphs: true,

        // Whether or not you want to show the Word Count
        showWordCount: true,

        // Whether or not you want to show the Char Count
        showCharCount: true,

        // Whether or not you want to count Spaces as Chars
        countSpacesAsChars: false,

        // Whether or not to include Html chars in the Char Count
        countHTML: false

        // Maximum allowed Word Count, -1 is default for unlimited
        //maxWordCount: -1,

        // Maximum allowed Char Count, -1 is default for unlimited
        //maxCharCount: -1
    };


};
