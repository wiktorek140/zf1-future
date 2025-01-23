<?php

class Zend_Form_Decorator_Info extends Zend_Form_Decorator_Abstract
{
    /**
     * Render a info
     *
     * @param  string $content
     * @return string
     */
    public function render($content)
    {
        $element = $this->getElement();
        $info = $element->getInfo();

        if (empty($info)) {
            return $content;
        }

        if ($element instanceof Zend_Form_Element_MultiCheckbox) {
            $content = $this->buildMultiCheckboxInfo($content, $info);
        }

        if ($element instanceof Zend_Form_Element_Checkbox) {
            $content = $this->buildCheckboxInfo($content, $info);
        }

        return $content;
    }

    private function buildMultiCheckboxInfo(string $content, ?string $info): string
    {
        $decorator = new Zend_Form_Decorator_HtmlTag();
        $decorator->setOptions(['tag' => 'span', 'class' => 'multi-checkbox-info']);

        $infoElement = $decorator->render($info);

        return str_replace(
            [
                'class="optional"',
                'class="checkbox pretty-checkbox form-group type-multicheckbox"',
                '<span class="help-block error hide-s"></span>'
            ],
            [
                'class="optional multi-checkbox-label"',
                'class="checkbox pretty-checkbox form-group form-group-big type-multicheckbox"',
                $infoElement . '<span class="help-block error hide-s"></span>'
            ],
            $content
        );
    }

    private function buildCheckboxInfo(string $content, ?string $info): string
    {
        $decorator = new Zend_Form_Decorator_HtmlTag();
        $decorator->setOptions(['tag' => 'span', 'class' => 'checkbox-info']);

        $infoElement = $decorator->render($info);

        return str_replace(
            [
                // Regular checkbox
                'class="optional"',
                'class="checkbox pretty-checkbox form-group type-checkbox"',

                // Switch toggle style
                'class="switch optional"',
                'class="checkbox form-group type-checkbox"',

                // Prepend info
                '<span class="help-block error hide-s"></span>'
            ],
            [
                // Regular checkbox
                'class="optional checkbox-label"',
                'class="checkbox pretty-checkbox form-group form-group-big type-checkbox"',

                // Switch toggle style
                'class="switch optional checkbox-label"',
                'class="checkbox form-group form-group-big type-checkbox"',

                // Prepend info
                '<div>' . $infoElement . '</div><span class="help-block error hide-s"></span>'
            ],
            $content
        );
    }
}
