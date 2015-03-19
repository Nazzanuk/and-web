<?php
class ANDigitalSettingsPage
{
    /**
     * Holds the values to be used in the fields callbacks
     */
    private $options;

    /**
     * Start up
     */
    public function __construct()
    {
        add_action( 'admin_menu', array( $this, 'add_plugin_page' ) );
        add_action( 'admin_init', array( $this, 'page_init' ) );
    }

    /**
     * Add options page
     */
    public function add_plugin_page()
    {
        // This page will be under "Settings"
        add_options_page(
            'Settings Admin', 
            'ANDigital Settings', 
            'manage_options', 
            'andigital-setting-admin', 
            array( $this, 'create_admin_page' )
        );
    }

    /**
     * Options page callback
     */
    public function create_admin_page()
    {
        // Set class property
        $this->options = get_option( 'andigital_theme_settings' );
        ?>
        <div class="wrap">
            <?php screen_icon(); ?>
            <h2>ANDigital Settings</h2>           
            <form method="post" action="options.php">
            <?php
                // This prints out all hidden setting fields
                settings_fields( 'andigital_theme_settings_group' );   
                do_settings_sections( 'andigital-setting-admin' );
                submit_button(); 
            ?>
            </form>
        </div>
        <?php
    }

    /**
     * Register and add settings
     */
    public function page_init()
    {        
        register_setting(
            'andigital_theme_settings_group', // Option group
            'andigital_theme_settings', // Option name
            array( $this, 'sanitize' ) // Sanitize
        );

        add_settings_section(
            'setting_section_id', // ID
            'Global Settings', // Title
            array( $this, 'print_section_info' ), // Callback
            'andigital-setting-admin' // Page
        );  

        add_settings_field(
            'analytics_type', // ID
            'Analytics Type', // Title
            array( $this, 'analytics_type_callback' ), // Callback
            'andigital-setting-admin', // Page
            'setting_section_id' // Section
        );      

        add_settings_field(
            'analytics_id', // ID
            'Analytics ID', // Title 
            array( $this, 'analytics_id_callback' ), // Callback
            'andigital-setting-admin', // Page
            'setting_section_id' // Section           
        );      

        add_settings_field(
            'analytics_pages', // ID
            'Analytics Enabled Pages', // Title 
            array( $this, 'analytics_pages_callback' ), // Callback
            'andigital-setting-admin', // Page
            'setting_section_id' // Section           
        );      
    }

    /**
     * Sanitize each setting field as needed
     *
     * @param array $input Contains all settings fields as array keys
     */
    public function sanitize( $input )
    {
        $new_input = array();
        if( isset( $input['analytics_id'] ) )
            $new_input['analytics_id'] = sanitize_text_field( $input['analytics_id'] );
            //$new_input['analytics_id'] = absint( $input['analytics_id'] );

        if( isset( $input['analytics_type'] ) )
            $new_input['analytics_type'] = sanitize_text_field( $input['analytics_type'] );

        if( isset( $input['analytics_pages'] ) )
            $new_input['analytics_pages'] = $input['analytics_pages'];

        return $new_input;
    }

    /** 
     * Print the Section text
     */
    public function print_section_info()
    {
        print 'Enter your settings below:';
    }

    /** 
     * Get the settings option array and print one of its values
     */
    public function analytics_id_callback()
    {
        printf(
            '<input type="text" id="analytics_id" name="andigital_theme_settings[analytics_id]" value="%s" />',
            isset( $this->options['analytics_id'] ) ? esc_attr( $this->options['analytics_id']) : ''
        );
    }

    /** 
     * Get the settings option array and print one of its values
     */
    public function analytics_type_callback()
    {
        printf(
            '<select id="analytics_type" name="andigital_theme_settings[analytics_type]"><option value="standard" ' . ($this->options['analytics_type'] == 'standard' ? 'selected' : '') . '>Standard</option><option value="universal" ' . ($this->options['analytics_type'] == 'universal' ? 'selected' : '') . '>Universal</option></select>'
        );
    }

    /** 
     * Get the settings option array and print one of its values
     */
    public function analytics_pages_callback()
    {
		$pages = get_pages(); foreach ($pages as $page) {     
		     printf(
		     	'<input id="page_<?php echo $page->ID; ?>" type="checkbox" name="andigital_theme_settings[analytics_pages][]" value="' . $page->post_title . '" ' . (( in_array($page->post_title, (array) $this->options['analytics_pages']) ) ? 'checked' : '') . '/>' . $page->post_title . '<br>'
		     );
		}
    }
}

if( is_admin() )
    $andigital_settings_page = new ANDigitalSettingsPage();