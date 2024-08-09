<?php

namespace App\Providers;

use App\Contracts\ContactRepositoryInterface;
use App\Contracts\HeroBannerRepositoryInterface;
use App\Contracts\NewsletterRepositoryInterface;
use App\Contracts\PartnershipRepositoryInterface;
use App\Contracts\ProductCategoryRepositoryInterface;
use App\Contracts\ProductRepositoryInterface;
use App\Contracts\ProductVariantRepositoryInterface;
use App\Contracts\UserRepositoryInterface;
use App\Repositories\ContactRepository;
use App\Repositories\HeroBannerRepository;
use App\Repositories\NewsletterRepository;
use App\Repositories\PartnershipRepository;
use App\Repositories\ProductCategoryRepository;
use App\Repositories\ProductRepository;
use App\Repositories\ProductVariantRepository;
use App\Repositories\UserRepository;
use App\Services\ContactService;
use App\Services\HeroBannerService;
use App\Services\NewsletterService;
use App\Services\PartnershipService;
use App\Services\ProductCategoryService;
use App\Services\ProductService;
use App\Services\ProductVariantService;
use App\Services\UserService;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        // User
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(UserService::class, function ($app) {
            return new UserService($app->make(UserRepositoryInterface::class));
        });

        // Product
        $this->app->bind(ProductRepositoryInterface::class, ProductRepository::class);
        $this->app->bind(ProductService::class, function ($app) {
            return new ProductService($app->make(ProductRepositoryInterface::class));
        });

        // Product Repository
        $this->app->bind(ProductCategoryRepositoryInterface::class, ProductCategoryRepository::class);
        $this->app->bind(ProductCategoryService::class, function ($app) {
            return new ProductCategoryService($app->make(ProductCategoryRepositoryInterface::class));
        });

        // Product Variant
        $this->app->bind(ProductVariantRepositoryInterface::class, ProductVariantRepository::class);
        $this->app->bind(ProductVariantService::class, function ($app) {
            return new ProductVariantService($app->make(ProductVariantRepositoryInterface::class));
        });

        // Hero Banner
        $this->app->bind(HeroBannerRepositoryInterface::class, HeroBannerRepository::class);
        $this->app->bind(HeroBannerService::class, function ($app) {
            return new HeroBannerService($app->make(HeroBannerRepositoryInterface::class));
        });

        // Newsletter
        $this->app->bind(NewsletterRepositoryInterface::class, NewsletterRepository::class);
        $this->app->bind(NewsletterService::class, function ($app) {
            return new NewsletterService($app->make(NewsletterRepositoryInterface::class));
        });

        // Partnership
        $this->app->bind(PartnershipRepositoryInterface::class, PartnershipRepository::class);
        $this->app->bind(PartnershipService::class, function ($app) {
            return new PartnershipService($app->make(PartnershipRepositoryInterface::class));
        });

        // Contact
        $this->app->bind(ContactRepositoryInterface::class, ContactRepository::class);
        $this->app->bind(ContactService::class, function ($app) {
            return new ContactService($app->make(ContactRepositoryInterface::class));
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
