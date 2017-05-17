<?php

defined('MOODLE_INTERNAL') || die();

/**
 * pycode filtering
 */
class filter_pycode extends moodle_text_filter {


    /*
     * Add the javascript to enable pycode processing on this page.
     *
     * @param moodle_page $page The current page.
     * @param context $context The current context.
     */
    public function setup($page, $context) 
	{
        // This only requires execution once per request.
        static $jsinitialised = false;

        if (empty($jsinitialised)) 
		{
			if (strpos($page->url->get_path(), 'edit')  != true )
			{
				$page->requires->js_call_amd('filter_pycode/little-loader-lazy', 'init', '');
				$page->requires->js_call_amd('filter_pycode/pycode-lazy', 'init', '');
			}
			
			//$page->requires->js('/filter/pycode/amd/src/pycode.js', true);
            $jsinitialised = true;
        }
    }

    /*
     * This function wraps the filtered text in a span, that pycode is configured to process.
     *
     * @param string $text The text to filter.
     * @param array $options The filter options.
     */
    public function filter($text, array $options = array()) {
        global $PAGE;

        return $text;
    }
}
?>