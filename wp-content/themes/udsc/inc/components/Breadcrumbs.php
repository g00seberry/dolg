<?php
/**
 * Breadcrumbs component for UDSC theme
 *
 * @package udsc
 * @since 2.0.0
 */

class UDSC_Breadcrumbs {

    /**
     * Render breadcrumbs markup.
     *
     * @return string
     */
    public static function render() {
        if (is_front_page()) {
            return '';
        }

        $crumbs = self::build_crumbs();

        if (count($crumbs) < 2) {
            return '';
        }

        $items = array();
        $last_index = count($crumbs) - 1;

        foreach ($crumbs as $index => $crumb) {
            $label = isset($crumb['label']) ? $crumb['label'] : '';
            $url   = isset($crumb['url']) ? $crumb['url'] : '';

            if ($label === '') {
                continue;
            }

            if ($index === $last_index || empty($url)) {
                $items[] = '<span class="breadcrumbs__item breadcrumbs__item--current" aria-current="page">' . esc_html($label) . '</span>';
            } else {
                $items[] = '<a class="breadcrumbs__item" href="' . esc_url($url) . '">' . esc_html($label) . '</a>';
            }
        }

        if (empty($items)) {
            return '';
        }

        return '<nav class="breadcrumbs text-sm text-muted-foreground" aria-label="breadcrumb"><div class="breadcrumbs__list flex flex-wrap gap-1">' . implode('<span class="breadcrumbs__separator text-border">/</span>', $items) . '</div></nav>';
    }

    /**
     * Build crumbs array for current request.
     *
     * @return array[]
     */
    private static function build_crumbs() {
        $crumbs = array(
            array(
                'label' => __('Главная', 'udsc'),
                'url'   => home_url('/'),
            ),
        );

        if (is_home()) {
            $page_for_posts = get_option('page_for_posts');

            if ($page_for_posts) {
                $crumbs[] = array(
                    'label' => get_the_title($page_for_posts),
                    'url'   => '',
                );
            } else {
                $crumbs[] = array(
                    'label' => __('Блог', 'udsc'),
                    'url'   => '',
                );
            }

            return $crumbs;
        }

        if (is_post_type_archive()) {
            $post_type = get_query_var('post_type');
            if (is_array($post_type)) {
                $post_type = reset($post_type);
            }

            $post_type_obj = $post_type ? get_post_type_object($post_type) : null;

            if ($post_type_obj) {
                $crumbs[] = array(
                    'label' => $post_type_obj->labels->name,
                    'url'   => '',
                );
            }

            return $crumbs;
        }

        if (is_tax() || is_category() || is_tag()) {
            $term = get_queried_object();

            if ($term && ! is_wp_error($term)) {
                $taxonomy = get_taxonomy($term->taxonomy);

                if ($taxonomy && ! empty($taxonomy->object_type)) {
                    $post_type = reset($taxonomy->object_type);
                    $post_type_obj = get_post_type_object($post_type);

                    if ($post_type_obj && $post_type_obj->has_archive) {
                        $crumbs[] = array(
                            'label' => $post_type_obj->labels->name,
                            'url'   => get_post_type_archive_link($post_type),
                        );
                    }
                }

                if ($term->parent) {
                    $ancestors = array_reverse(get_ancestors($term->term_id, $term->taxonomy));
                    foreach ($ancestors as $ancestor_id) {
                        $ancestor = get_term($ancestor_id, $term->taxonomy);
                        if (! $ancestor || is_wp_error($ancestor)) {
                            continue;
                        }
                        $crumbs[] = array(
                            'label' => $ancestor->name,
                            'url'   => get_term_link($ancestor),
                        );
                    }
                }

                $crumbs[] = array(
                    'label' => $term->name,
                    'url'   => '',
                );
            }

            return $crumbs;
        }

        if (is_search()) {
            $crumbs[] = array(
                'label' => sprintf(__('Результаты поиска для "%s"', 'udsc'), get_search_query()),
                'url'   => '',
            );
            return $crumbs;
        }

        if (is_404()) {
            $crumbs[] = array(
                'label' => __('Страница не найдена', 'udsc'),
                'url'   => '',
            );
            return $crumbs;
        }

        if (is_singular()) {
            $post = get_queried_object();

            if (! $post) {
                return $crumbs;
            }

            if ($post->post_type === 'post') {
                $page_for_posts = get_option('page_for_posts');

                if ($page_for_posts) {
                    $crumbs[] = array(
                        'label' => get_the_title($page_for_posts),
                        'url'   => get_permalink($page_for_posts),
                    );
                } else {
                    $crumbs[] = array(
                        'label' => __('Блог', 'udsc'),
                        'url'   => '',
                    );
                }
            } elseif ($post->post_type !== 'page') {
                $post_type_obj = get_post_type_object($post->post_type);
                if ($post_type_obj) {
                    if ($post_type_obj->has_archive) {
                        $crumbs[] = array(
                            'label' => $post_type_obj->labels->name,
                            'url'   => get_post_type_archive_link($post->post_type),
                        );
                    }
                }
            }

            if (is_post_type_hierarchical($post->post_type)) {
                $ancestors = array_reverse(get_post_ancestors($post));
                foreach ($ancestors as $ancestor_id) {
                    $crumbs[] = array(
                        'label' => get_the_title($ancestor_id),
                        'url'   => get_permalink($ancestor_id),
                    );
                }
            }

            $crumbs[] = array(
                'label' => get_the_title($post),
                'url'   => '',
            );
        }

        return $crumbs;
    }
}

