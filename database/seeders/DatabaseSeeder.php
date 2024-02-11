<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Database\Seeders\Etim\ClassFeatureSeeder;
use Database\Seeders\Etim\EtimFeatureSeeder;
use Database\Seeders\Etim\FeatureSeeder;
use Database\Seeders\Etim\FeatureValueSeeder;
use Database\Seeders\Etim\GroupSeeder;
use Database\Seeders\Etim\EtimLanguageSeeder;
use Database\Seeders\Etim\ModellingClassFeatureSeeder;
use Database\Seeders\Etim\ModellingClassPortSeeder;
use Database\Seeders\Etim\ModellingClassSeeder;
use Database\Seeders\Etim\ModellingGroupSeeder;
use Database\Seeders\Etim\ProductClassSeeder;
use Database\Seeders\Etim\SynonymSeeder;
use Database\Seeders\Etim\TranslationSeeder;
use Database\Seeders\Etim\UnitSeeder;
use Database\Seeders\Etim\UnitTranslationSeeder;
use Database\Seeders\Etim\ValueSeeder;
use Database\Seeders\EtimXchange\AllowanceSurchargeSeeder;
use Database\Seeders\EtimXchange\CatalogueSeeder;
use Database\Seeders\EtimXchange\CatalogueSupplierSeeder;
use Database\Seeders\EtimXchange\ClassificationFeatureSeeder;
use Database\Seeders\EtimXchange\EnclosedTradeItemSeeder;
use Database\Seeders\EtimXchange\EtimClassificationSeeder;
use Database\Seeders\EtimXchange\EtimModellingFeatureSeeder;
use Database\Seeders\EtimXchange\EtimModellingPortSeeder;
use Database\Seeders\EtimXchange\EtimValueMatrixSeeder;
use Database\Seeders\EtimXchange\ItemAttachmentSeeder;
use Database\Seeders\EtimXchange\ItemCountrySpecificFieldSeeder;
use Database\Seeders\EtimXchange\ItemDescriptionSeeder;
use Database\Seeders\EtimXchange\ItemDetailSeeder;
use Database\Seeders\EtimXchange\ItemLogisticDetailSeeder;
use Database\Seeders\EtimXchange\ItemRelationSeeder;
use Database\Seeders\EtimXchange\LcaDeclarationSeeder;
use Database\Seeders\EtimXchange\LcaEnvironmentalSeeder;
use Database\Seeders\EtimXchange\LegislationSeeder;
use Database\Seeders\EtimXchange\OrderingSeeder;
use Database\Seeders\EtimXchange\OtherClassificationSeeder;
use Database\Seeders\EtimXchange\PackagingDetailSeeder;
use Database\Seeders\EtimXchange\PackagingIdentificationSeeder;
use Database\Seeders\EtimXchange\PriceSeeder;
use Database\Seeders\EtimXchange\ProductAttachmentSeeder;
use Database\Seeders\EtimXchange\ProductCountrySpecificFieldSeeder;
use Database\Seeders\EtimXchange\ProductDescriptionSeeder;
use Database\Seeders\EtimXchange\ProductDetailSeeder;
use Database\Seeders\EtimXchange\ProductRelationSeeder;
use Database\Seeders\EtimXchange\ProductSeeder;
use Database\Seeders\EtimXchange\SupplierAttachmentSeeder;
use Database\Seeders\EtimXchange\SupplierSeeder;
use Database\Seeders\EtimXchange\TradeItemSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            EtimLanguageSeeder::class,
            GroupSeeder::class,
            ProductClassSeeder::class,
            FeatureSeeder::class,
            ValueSeeder::class,
            UnitSeeder::class,
            ClassFeatureSeeder::class,
            FeatureValueSeeder::class,
            ModellingGroupSeeder::class,
            ModellingClassSeeder::class,
            ModellingClassPortSeeder::class,
            ModellingClassFeatureSeeder::class,
            SynonymSeeder::class,
            TranslationSeeder::class,
            UnitTranslationSeeder::class,
            CatalogueSeeder::class,
            SupplierSeeder::class,
            SupplierAttachmentSeeder::class,
            CatalogueSupplierSeeder::class,
            ProductSeeder::class,
            ProductAttachmentSeeder::class,
            ProductCountrySpecificFieldSeeder::class,
            ProductDescriptionSeeder::class,
            ProductDetailSeeder::class,
            ProductRelationSeeder::class,
            LegislationSeeder::class,
            LcaEnvironmentalSeeder::class,
            LcaDeclarationSeeder::class,
            EtimClassificationSeeder::class,
            EtimFeatureSeeder::class,
            EtimModellingPortSeeder::class,
            EtimModellingFeatureSeeder::class,
            EtimValueMatrixSeeder::class,
            OtherClassificationSeeder::class,
            ClassificationFeatureSeeder::class,
            TradeItemSeeder::class,
            ItemAttachmentSeeder::class,
            ItemDetailSeeder::class,
            ItemLogisticDetailSeeder::class,
            ItemDescriptionSeeder::class,
            ItemRelationSeeder::class,
            ItemCountrySpecificFieldSeeder::class,
            OrderingSeeder::class,
            PriceSeeder::class,
            AllowanceSurchargeSeeder::class,
            PackagingIdentificationSeeder::class,
            PackagingDetailSeeder::class,
            EnclosedTradeItemSeeder::class,

        ]);
    }
}
