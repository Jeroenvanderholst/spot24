<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;


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
            ProductClassFeatureSeeder::class,
            ModellingGroupSeeder::class,
            ModellingClassSeeder::class,
            ModellingClassPortSeeder::class,
            ModellingClassFeatureSeeder::class,
            FeatureValueSeeder::class,
            SynonymSeeder::class,
            TranslationSeeder::class,
            UnitTranslationSeeder::class,
            ClassLinkSeeder::class,
            ReleaseSeeder::class,
            ClassReleaseSeeder::class,
            /*
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
            */

        ]);
    }
}
