<?php
/**
 *
 * @author Sean McGary <sean.mcgary@gmail.com>
 */
class Form_Framework
{

   public static function search_form()
    {
        $form = array();

        $search_text = self::input('search_text', 'search_text', '', '', 'pretty', 'form-field');
        $search_text_label = self::label('Search (uid and cn)', 'form-label');

        $form[] = '<form id="search_form">';
        $form[] = self::div_wrap('create-new-container', array($search_text_label, $search_text));
        $form[] = self::div_wrap('create-new-container', array('<br><input type="submit" value="Submit" id="submit_search">'));
        $form[] = form_close();


        return $form;


    }

    public static function auto_register_form($ip_addresses, $un = '', $mac = '', $hn = '')
    {
        $form = array();

        $username = self::input('username', 'username', '', $un, 'pretty', 'form-field');
        $username_label = self::label('Username', 'form-label');

        $macaddress = self::input('mac_address', 'mac_address', '', $mac, 'pretty', 'form-field');
        $macaddress_label = self::label('Mac Address', 'form-label');

        $hostname = self::input('hostname', 'hostname', '', $hn, 'pretty', 'form-field');
        $hostname_label = self::label('Hostname', 'form-label');

        $addresses = self::dropdown('ip_address', 'ip_address', $ip_addresses, 'ip_address', 'pretty', 'form-field');
        $addresses_label = self::label('IP Address', 'form-label');



        $form[] = '<form id="register_form">';
        $form[] = self::div_wrap('create-new-container', array($username_label, $username));
        $form[] = self::div_wrap('create-new-container', array($macaddress_label, $macaddress));
        $form[] = self::div_wrap('create-new-container', array($hostname_label, $hostname));
        $form[] = self::div_wrap('create-new-container', array($addresses_label, $addresses));

        $form[] = self::div_wrap('create-new-container', array('<input type="submit" value="Submit" id="submit_registration"'));
        $form[] = form_close();
        


        return $form;


    }

    /**
     * Wraps form elements in a div
     *
     * @param String $div_class             The class of the div you want to wrap with
     * @param List<String> $form_elements   The form elements you wish to wrap
     * @return String <HTML>                HTML String of wrapped elements
     */
    public static function div_wrap($div_class, $form_elements)
    {
        $wrap = '<div class="'.$div_class.'">';
        foreach($form_elements as $elm)
        {
            $wrap .= $elm;
        }
        $wrap .= '</div>';

        return $wrap;
    }

    /**
     * Creates a form label from a string and a div
     *
     * @param String $label         The text to display
     * @param String $div_wrapper   The div class to wrap the text in
     * @return String <HTML>        HTML String of formatted text
     */
    public static function label($label, $div_wrapper = '')
    {
        if($div_wrapper != '')
        {
            $label = '<div class="'.$div_wrapper.'">'.$label.'</div>';
        }

        return $label;
    }

    public static function dropdown($name = '', $id = '', $data = array(), $index, $class = '', $div_wrapper = '')
    {
        $dropdown = '<select name="'.$name.'" id="'.$id.'">';

        foreach($data as $key => $value)
        {
            $dropdown .= '<option value="'.$value[$index].'">'.$value[$index].'</option>';
        }

        $dropdown .= '</select>';

        if($div_wrapper != '')
        {
            $dropdown = '<div class="'.$div_wrapper.'">'.$dropdown.'</div>';
        }

        return $dropdown;
    }

    /**
     * Wrapper function around Codeigniters form_input function used to generate
     * a formatted input element.
     *
     * @param String $name          Name of the form element
     * @param String $id            Id of the form element
     * @param int $size             [optional] Size of the input field
     * @param String $value         [optional] Default input value
     * @param String $class         [optional] Class to apply to input
     * @param String $div_wrapper   [optional] Div class to wrap input in
     * @return String <HTML>        Formatted HTML String of form input
     */
    public static function input($name, $id, $size = '', $value = '', $class = '', $div_wrapper = '')
    {
        $cfg = array('id' => $id,
                     'name' => $name,
                    );


        if($size != '')
        {
            $cfg['size'] = $size;
        }

        if($value != '')
        {
            $cfg['value'] = $value;
        }

        if($class != '')
        {
            $cfg['class'] = $class;
        }

        $input = form_input($cfg);

        if($div_wrapper != '')
        {
            $input = '<div class="'.$div_wrapper.'">'.$input.'</div>';
        }

        return $input;
    }

    /**
     * Wrapper function around Codeigniters form_input function used to generate
     * a formatted input element.
     *
     * @param String $name          Name of the form element
     * @param String $id            Id of the form element
     * @param int $size             [optional] Size of the input field
     * @param String $value         [optional] Default input value
     * @param String $class         [optional] Class to apply to input
     * @param String $div_wrapper   [optional] Div class to wrap input in
     * @return String <HTML>        Formatted HTML String of form input
     */
    public static function checkbox($name, $id, $value = '', $checked = false, $class = '', $div_wrapper = '')
    {
        $cfg = array('id' => $id,
                     'name' => $name,
                     'checked' => $checked,
                    );

        if($value != '')
        {
            $cfg['value'] = $value;
        }
        
        if($class != '')
        {
            $cfg['class'] = $class;
        }

        $checkbox = form_checkbox($cfg);

        if($div_wrapper != '')
        {
            $checkbox = '<div class="'.$div_wrapper.'">'.$checkbox.'</div>';
        }

        return $checkbox;
    }

    /**
     * Wrapper function for Codeigniters form_textarea function used to generate
     * a formatted textarea element
     *
     * @param String $name          Name of the form element
     * @param String $id            Id of the form element
     * @param int $rows             [optional] Number of rows
     * @param int $cols             [optional] Number of rows
     * @param String $value         [optional] Default input value
     * @param String $class         [optional] Class to apply to textarea
     * @param String $div_wrapper   [optional] Div class to wrap textarea in
     * @return String <HTML>        Formatted HTML String of form input
     */
    public static function textarea($name, $id, $rows = '', $cols = '', $value = '', $class = '', $div_wrapper = '')
    {
        $cfg = array('id' => $id,
                     'name' => $name,
                    );

        if($rows != '')
        {
            $cfg['rows'] = $rows;
        }

        if($cols != '')
        {
            $cfg['cols'] = $cols;
        }

        if($value != '')
        {
            $cfg['value'] = $value;
        }

        if($class != '')
        {
            $cfg['class'] = $class;
        }

        $textarea = form_textarea($cfg);

        if($div_wrapper != '')
        {
            $textarea = '<div class="'.$div_wrapper.'">'.$textarea.'</div>';
        }

        return $textarea;
    }
}
?>
