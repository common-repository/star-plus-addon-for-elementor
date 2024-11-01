<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly 


class starplus_addon_for_elementor_cardicon extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'star-addon-cardicons';
    }
    public function get_title()
    {
        return esc_html__('Icon Card', 'star-plus-addon-for-elementor');
    }


    public function get_icon()
    {
        return 'eicon-gallery-grid';
    }


    public function get_categories()
    {
        return ['starplus-addon'];
    }


    protected function _register_controls()
    {

        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__('Content', 'star-plus-addon-for-elementor'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'list_title',
            [
                'label' => esc_html__('Title', 'star-plus-addon-for-elementor'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('List Title', 'star-plus-addon-for-elementor'),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'icon',
            [
                'label' => esc_html__('Icon', 'star-plus-addon-for-elementor'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-star',
                    'library' => 'fa-solid',
                ]
                
            ]

        );
        $repeater->add_control(
            'list_content',
            [
                'label' => esc_html__('Content', 'star-plus-addon-for-elementor'),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => esc_html__('List Content', 'star-plus-addon-for-elementor'),
                'show_label' => false,
            ]
        );



        $this->add_control(
            'list',
            [
                'label' => esc_html__('Icon Card', 'star-plus-addon-for-elementor'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'list_title' => esc_html__('Title #1', 'star-plus-addon-for-elementor'),
                        'list_content' => esc_html__('Item content. Click the edit button to change this text.', 'star-plus-addon-for-elementor'),
                    ],
                    [
                        'list_title' => esc_html__('Title #2', 'star-plus-addon-for-elementor'),
                        'list_content' => esc_html__('Item content. Click the edit button to change this text.', 'star-plus-addon-for-elementor'),
                    ],
                    [
                        'list_title' => esc_html__('Title #3', 'star-plus-addon-for-elementor'),
                        'list_content' => esc_html__('Item content. Click the edit button to change this text.', 'star-plus-addon-for-elementor'),
                    ],
                    [
                        'list_title' => esc_html__('Title #4', 'star-plus-addon-for-elementor'),
                        'list_content' => esc_html__('Item content. Click the edit button to change this text.', 'star-plus-addon-for-elementor'),
                    ],
                ],
                'title_field' => '{{{ list_title }}}',
            ]
        );

        $this->end_controls_section();

        // for typography
        $this->start_controls_section(
            'typography_section',
            [
                'label' => esc_html__('Typography', 'star-plus-addon-for-elementor'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'title_typo',
                'label' => esc_html__('Title Typography', 'star-plus-addon-for-elementor'),
                'selector' => '{{WRAPPER}} .icon-card-inner h3',
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => esc_html__('Title Color', 'star-plus-addon-for-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .icon-card-inner h3' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'content_typo',
                'label' => esc_html__('Content Typography', 'star-plus-addon-for-elementor'),
                'selector' => '{{WRAPPER}} .icon-card-inner p',
            ]
        );

        $this->add_control(
            'content_color',
            [
                'label' => esc_html__('Content Color', 'star-plus-addon-for-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .icon-card-inner p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'icon_style_section',
            [
                'label' => esc_html__('Icon Style', 'star-plus-addon-for-elementor'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'icon_color',
            [
                'label' => esc_html__('Icon Color', 'star-plus-addon-for-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .icon-card-inner i' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'icon_size',
            [
                'label' => esc_html__('Icon Size', 'star-plus-addon-for-elementor'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'default' => [
            'size' => 65,
            'unit' => 'px',
        ],
                'range' => [
                    'px' => [
                        'min' => 10,
                        'max' => 85,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .icon-card-inner i' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'card_style_section',
            [
                'label' => esc_html__('Card Style', 'star-plus-addon-for-elementor'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'card_background',
            [
                'label' => esc_html__('Background Color', 'star-plus-addon-for-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .icon-card-inner' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'card_box_shadow',
                'selector' => '{{WRAPPER}} .icon-card-inner',
                'fields_options' => [
                    'box_shadow_type' => [
                        'default' => 'yes',
                    ],
                    'box_shadow' => [
                        'default' => [
                            'horizontal' => 11,
                            'vertical' => 11,
                            'blur' => 15,
                            'color' => 'rgba(16, 24, 40, 0.06)',
                        ],
                    ],
                    
                ],
            ]
        );

        $this->add_responsive_control(
            'card_margin',
            [
                'label' => esc_html__('Margin', 'star-plus-addon-for-elementor'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'default' => [
                    'top' => 10,
                    'right' => 10,
                    'bottom' => 10,
                    'left' => 10,
                    'unit' => 'px',
                    'isLinked' => false,
                ],
                'selectors' => [
                    '{{WRAPPER}} .icon-card-inner' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'card_padding',
            [
                'label' => esc_html__('Padding', 'star-plus-addon-for-elementor'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'default' => [
                    'top' => 30,
                    'right' => 30,
                    'bottom' => 30,
                    'left' => 30,
                    'unit' => 'px',
                    'isLinked' => true,
                ],
                'selectors' => [
                    '{{WRAPPER}} .icon-card-inner' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'card_border_radius',
            [
                'label' => esc_html__('Border Radius', 'star-plus-addon-for-elementor'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'default' => [
                    'top' => 16,
                    'right' => 16,
                    'bottom' => 16,
                    'left' => 16,
                    'unit' => 'px',
                    'isLinked' => true,
                ],
                'selectors' => [
                    '{{WRAPPER}} .icon-card-inner' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        // icon-container controll

        $this->start_controls_section(
            'icon_container_style_section',
            [
                'label' => esc_html__('Icon Container Style', 'star-plus-addon-for-elementor'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'icon_container_background',
            [
                'label' => esc_html__('Background Color', 'star-plus-addon-for-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .iconContainer' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'icon_container_box_shadow',
                'selector' => '{{WRAPPER}} .iconContainer',
                'fields_options' => [
                    'box_shadow_type' => [
                        'default' => 'yes',
                    ],
                    'box_shadow' => [
                        'default' => [
                            'horizontal' => 0,
                            'vertical' => 1,
                            'blur' => 2,
                            'spread' => 0,
                            'color' => 'rgba(16, 24, 40, 0.06)',
                        ],
                    ],
                ],
            ]
        );

        $this->add_responsive_control(
            'icon_container_width',
            [
                'label' => esc_html__('Width', 'star-plus-addon-for-elementor'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'default' => [
                    'size' => 100,
                    'unit' => 'px',
                ],
                'range' => [
                    'px' => [
                        'min' => 50,
                        'max' => 300,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .iconContainer' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'icon_container_height',
            [
                'label' => esc_html__('Height', 'star-plus-addon-for-elementor'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'default' => [
                    'size' => 100,
                    'unit' => 'px',
                ],
                'range' => [
                    'px' => [
                        'min' => 50,
                        'max' => 300,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .iconContainer' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'icon_container_padding',
            [
                'label' => esc_html__('Padding', 'star-plus-addon-for-elementor'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'default' => [
                    'top' => 20,
                    'right' => 20,
                    'bottom' => 20,
                    'left' => 20,
                    'unit' => 'px',
                    'isLinked' => true,
                ],
                'selectors' => [
                    '{{WRAPPER}} .iconContainer' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'icon_container_border_radius',
            [
                'label' => esc_html__('Border Radius', 'star-plus-addon-for-elementor'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'default' => [
                    'top' => 16,
                    'right' => 16,
                    'bottom' => 16,
                    'left' => 16,
                    'unit' => 'px',
                    'isLinked' => true,
                ],
                'selectors' => [
                    '{{WRAPPER}} .iconContainer' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

    }


    protected function render()
    {

        $settings = $this->get_settings_for_display();

        if ($settings['list']) {
            echo '<div >';
            echo '<div class="row icon-card-container">';
            foreach ($settings['list'] as $item) {
                echo '<div class="col-md-3 icon-card-outer">';
                echo '<div class="icon-card-inner">';
                echo '<div class="iconContainer">';
                echo '<i class="' . esc_attr($item['icon']['value']) . '"></i>';
                echo '</div>';
                echo '<div class="text-container">';
                echo '<h3>' . esc_html($item['list_title']) . '</h3>';
                echo '<p>' . wp_kses_post($item['list_content']) . '</p>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
            echo '</div>';
            echo '</div>';
        }
    }
}
