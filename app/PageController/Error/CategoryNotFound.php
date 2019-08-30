<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class CategoryNotFound_Error_PageController extends Abstract_PageController
{
    public function handle(string $lang, Request $request, Response $response, $args): Response
    {
        // Don`t execute parent::handleRequest. Method have specific args.
        $this->lang = $lang;
        $this->translator = new Translator($this->lang, ROOT_PATH . '/app/Lang');

        $categoryURI = $args['category_uri'];

        $this->categoryTitle = $this->_categoryTitleFromURI($categoryURI);

        $category = new Category_Model();
        $category->title = $this->categoryTitle;

        $this->template = 'error/category_not_found';
        $this->showFooter = false;
        $this->pageTitle = $this->translator->get('error__category_not_found', 'page_title') . $this->categoryTitle . ' – ' . $this->translator->get('answeropedia');
        $this->pageDescription = $this->translator->get('error__category_not_found', 'page_title') . $this->categoryTitle;

        $this->categoryURI = $categoryURI;
        //$this->includeJS[] = 'goal/category_not_found';

        $output = $this->renderPage();
        $response->getBody()->write($output);

        return $response->withStatus(404);
    }

    private function _categoryTitleFromURI(string $uri): string
    {
        $uri = str_replace('__', 'DOUBLEUNDERLINE', $uri);
        $uri = str_replace('_', ' ', $uri);
        $title = str_replace('DOUBLEUNDERLINE', '_', $uri);

        return $title;
    }
}
