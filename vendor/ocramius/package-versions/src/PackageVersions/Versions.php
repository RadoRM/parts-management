<?php

declare(strict_types=1);

namespace PackageVersions;

/**
 * This class is generated by ocramius/package-versions, specifically by
 * @see \PackageVersions\Installer
 *
 * This file is overwritten at every run of `composer install` or `composer update`.
 */
final class Versions
{
    public const ROOT_PACKAGE_NAME = '__root__';
    /**
     * Array of all available composer packages.
     * Dont read this array from your calling code, but use the \PackageVersions\Versions::getVersion() method instead.
     *
     * @var array<string, string>
     * @internal
     */
    public const VERSIONS          = array (
  'doctrine/annotations' => 'v1.7.0@fa4c4e861e809d6a1103bd620cce63ed91aedfeb',
  'doctrine/cache' => 'v1.8.0@d768d58baee9a4862ca783840eca1b9add7a7f57',
  'doctrine/collections' => 'v1.6.2@c5e0bc17b1620e97c968ac409acbff28b8b850be',
  'doctrine/common' => 'v2.10.0@30e33f60f64deec87df728c02b107f82cdafad9d',
  'doctrine/dbal' => 'v2.9.2@22800bd651c1d8d2a9719e2a3dc46d5108ebfcc9',
  'doctrine/doctrine-bundle' => '1.11.2@28101e20776d8fa20a00b54947fbae2db0d09103',
  'doctrine/doctrine-cache-bundle' => '1.3.5@5514c90d9fb595e1095e6d66ebb98ce9ef049927',
  'doctrine/doctrine-migrations-bundle' => 'v2.0.0@4c9579e0e43df1fb3f0ca29b9c20871c824fac71',
  'doctrine/event-manager' => 'v1.0.0@a520bc093a0170feeb6b14e9d83f3a14452e64b3',
  'doctrine/inflector' => 'v1.3.0@5527a48b7313d15261292c149e55e26eae771b0a',
  'doctrine/instantiator' => '1.2.0@a2c590166b2133a4633738648b6b064edae0814a',
  'doctrine/lexer' => '1.1.0@e17f069ede36f7534b95adec71910ed1b49c74ea',
  'doctrine/migrations' => '2.1.1@a89fa87a192e90179163c1e863a145c13337f442',
  'doctrine/orm' => 'v2.6.3@434820973cadf2da2d66e7184be370084cc32ca8',
  'doctrine/persistence' => '1.1.1@3da7c9d125591ca83944f477e65ed3d7b4617c48',
  'doctrine/reflection' => 'v1.0.0@02538d3f95e88eb397a5f86274deb2c6175c2ab6',
  'egulias/email-validator' => '2.1.11@92dd169c32f6f55ba570c309d83f5209cefb5e23',
  'fig/link-util' => '1.0.0@1a07821801a148be4add11ab0603e4af55a72fac',
  'jdorn/sql-formatter' => 'v1.2.17@64990d96e0959dff8e059dfcdc1af130728d92bc',
  'ocramius/package-versions' => '1.5.1@1d32342b8c1eb27353c8887c366147b4c2da673c',
  'ocramius/proxy-manager' => '2.2.3@4d154742e31c35137d5374c998e8f86b54db2e2f',
  'phpdocumentor/reflection-common' => '1.0.1@21bdeb5f65d7ebf9f43b1b25d404f87deab5bfb6',
  'phpdocumentor/reflection-docblock' => '4.3.1@bdd9f737ebc2a01c06ea7ff4308ec6697db9b53c',
  'phpdocumentor/type-resolver' => '0.4.0@9c977708995954784726e25d0cd1dddf4e65b0f7',
  'psr/cache' => '1.0.1@d11b50ad223250cf17b86e38383413f5a6764bf8',
  'psr/container' => '1.0.0@b7ce3b176482dbbc1245ebf52b181af44c2cf55f',
  'psr/link' => '1.0.0@eea8e8662d5cd3ae4517c9b864493f59fca95562',
  'psr/log' => '1.1.0@6c001f1daafa3a3ac1d8ff69ee4db8e799a654dd',
  'psr/simple-cache' => '1.0.1@408d5eafb83c57f6365a3ca330ff23aa4a5fa39b',
  'sensio/framework-extra-bundle' => 'v5.3.1@5f75c4658b03301cba17baa15a840b57b72b4262',
  'swiftmailer/swiftmailer' => 'v6.2.1@5397cd05b0a0f7937c47b0adcb4c60e5ab936b6a',
  'symfony/apache-pack' => 'v1.0.1@3aa5818d73ad2551281fc58a75afd9ca82622e6c',
  'symfony/asset' => 'v4.2.11@82f5349982967842aeb7d2f8e876ac900be24f14',
  'symfony/cache' => 'v4.2.11@2a139a2697dbe06526b5f1d53bb0d21a574ba1f7',
  'symfony/config' => 'v4.2.11@637588756df1fb1c801833aead54a7153967c0cb',
  'symfony/console' => 'v4.2.11@fc2e274aade6567a750551942094b2145ade9b6c',
  'symfony/contracts' => 'v1.1.6@3692662d26cd9d204a69748792ae021c35313610',
  'symfony/debug' => 'v4.3.4@afcdea44a2e399c1e4b52246ec8d54c715393ced',
  'symfony/dependency-injection' => 'v4.2.11@39fe71bc481483f255e388a658c8f1104fec037e',
  'symfony/doctrine-bridge' => 'v4.2.11@5e8d62453eda38a523a12cc918031cc8f48e4b65',
  'symfony/dotenv' => 'v4.2.11@6163f061011009655da1bc615b38941bc460ef1b',
  'symfony/event-dispatcher' => 'v4.2.11@852548c7c704f14d2f6700c8d872a05bd2028732',
  'symfony/expression-language' => 'v4.2.11@ea23981c1dee4f2f901fce8345d34614237d57ca',
  'symfony/filesystem' => 'v4.2.11@1bd7aed2932cedd1c2c6cc925831dd8d57ea14bf',
  'symfony/finder' => 'v4.2.11@cecff7164790b0cd72be2ed20e9591d7140715e0',
  'symfony/flex' => 'v1.4.5@4467ab35c82edebac58fe58c22cea166a805eb1f',
  'symfony/form' => 'v4.2.11@c694ef3befb1e4bba58c33522533ecf1e11fd470',
  'symfony/framework-bundle' => 'v4.2.11@ac12bd9f104bb2dc319b09426e767ecfa95688da',
  'symfony/http-foundation' => 'v4.2.11@3f9f40ff0fc507b9994f182c5598e632d0bdaf3c',
  'symfony/http-kernel' => 'v4.2.11@4315ef021fa1daf271eabc4ec0b6644dcbdbba7b',
  'symfony/inflector' => 'v4.2.11@275e54941a4f17a471c68d2a00e2513fc1fd4a78',
  'symfony/intl' => 'v4.2.11@94aed330eda5cfe171bbd596d898c065e94c132f',
  'symfony/options-resolver' => 'v4.2.11@eda69aac1ea1f97a594dd9a5c64b7ff73a37ade2',
  'symfony/orm-pack' => 'v1.0.6@36c2a928482dc5f05c5c1c1b947242ae03ff1335',
  'symfony/polyfill-intl-icu' => 'v1.12.0@66810b9d6eb4af54d543867909d65ab9af654d7e',
  'symfony/polyfill-intl-idn' => 'v1.12.0@6af626ae6fa37d396dc90a399c0ff08e5cfc45b2',
  'symfony/polyfill-mbstring' => 'v1.12.0@b42a2f66e8f1b15ccf25652c3424265923eb4f17',
  'symfony/polyfill-php72' => 'v1.12.0@04ce3335667451138df4307d6a9b61565560199e',
  'symfony/process' => 'v4.2.11@808a4be7e0dd7fcb6a2b1ed2ba22dd581402c5e2',
  'symfony/property-access' => 'v4.2.11@c3532a4bdb785446970148da68e03dc11514e256',
  'symfony/property-info' => 'v4.2.11@c5d4e006eb3fb386c5b68cd3b1dbb3f0cc6516df',
  'symfony/routing' => 'v4.2.11@1174ae15f862a0f2d481c29ba172a70b208c9561',
  'symfony/security-bundle' => 'v4.2.11@48078d9ed0d88b1b902554dc870e78f3c20d53e8',
  'symfony/security-core' => 'v4.2.11@3ec42b5dbeee143715da686539751ea762dd8564',
  'symfony/security-csrf' => 'v4.2.11@ff004ea4d215fd4a740f6d6ca9643ff92326c16c',
  'symfony/security-guard' => 'v4.2.11@ef6d700e6be1ca75bc2788068c62506ab11461bd',
  'symfony/security-http' => 'v4.2.11@a3eddd912d93a8c77ffee2b31448e13864257f4e',
  'symfony/serializer' => 'v4.2.11@8a2974c10e8eb8eb2d36a28c1bd68eb0b411cc60',
  'symfony/serializer-pack' => 'v1.0.2@c5f18ba4ff989a42d7d140b7f85406e77cd8c4b2',
  'symfony/stopwatch' => 'v4.2.11@b1a5f646d56a3290230dbc8edf2a0d62cda23f67',
  'symfony/swiftmailer-bundle' => 'v3.2.8@cb125b3648f132fb8070b55393f20cb310907d3b',
  'symfony/translation' => 'v4.2.11@4b84015894d980745b510ba90492722cafe2f90f',
  'symfony/twig-bridge' => 'v4.2.11@708a993aaf3b979738d6e0a12bf157f02fc94998',
  'symfony/twig-bundle' => 'v4.2.11@db06490aeabba37dfc55a53fbf901c75e0d4f7b0',
  'symfony/validator' => 'v4.2.11@7b4485db55b7ea1a0d13d126c2781313017f815f',
  'symfony/var-exporter' => 'v4.2.11@8539c2cec7202d244058075351c61aa852ffa344',
  'symfony/web-link' => 'v4.2.11@47b8188b4bb8d24eef0bb287b0737d5b84a6cab8',
  'symfony/webpack-encore-bundle' => 'v1.6.2@5e1cab3d223f65933d59a5a95ea01a6ed2833db4',
  'symfony/yaml' => 'v4.2.11@9468fef6f1c740b96935e9578560a9e9189ca154',
  'twig/twig' => 'v2.11.3@699ed2342557c88789a15402de5eb834dedd6792',
  'webmozart/assert' => '1.5.0@88e6d84706d09a236046d686bbea96f07b3a34f4',
  'zendframework/zend-code' => '3.3.1@c21db169075c6ec4b342149f446e7b7b724f95eb',
  'zendframework/zend-eventmanager' => '3.2.1@a5e2583a211f73604691586b8406ff7296a946dd',
  'doctrine/data-fixtures' => 'v1.3.2@09b16943b27f3d80d63988d100ff256148c2f78b',
  'doctrine/doctrine-fixtures-bundle' => '3.2.2@90e4a4f968b2dae40e290a6ee516957af043f16c',
  'easycorp/easy-log-handler' => 'v1.0.7@5f95717248d20684f88cfb878d8bf3d78aadcbba',
  'fzaninotto/faker' => 'v1.8.0@f72816b43e74063c8b10357394b6bba8cb1c10de',
  'monolog/monolog' => '1.24.0@bfc9ebb28f97e7a24c45bdc3f0ff482e47bb0266',
  'nikic/php-parser' => 'v4.2.3@e612609022e935f3d0337c1295176505b41188c8',
  'symfony/browser-kit' => 'v4.2.11@3659f10d13d270b77506006bdf9250cac9268156',
  'symfony/css-selector' => 'v4.2.11@48eddf66950fa57996e1be4a55916d65c10c604a',
  'symfony/debug-bundle' => 'v4.2.11@7ad133ba7c5c932bca671d118aa634cd77ebb39f',
  'symfony/debug-pack' => 'v1.0.7@09a4a1e9bf2465987d4f79db0ad6c11cc632bc79',
  'symfony/dom-crawler' => 'v4.2.11@ba1da8fb10291714b8db153fcf7ac515e1a217bb',
  'symfony/maker-bundle' => 'v1.13.0@c4388410e2fb6321e77c5dd6e3cb2dba821f9fe6',
  'symfony/monolog-bridge' => 'v4.2.11@41b01701e23016b920638ed551c53f077daacefd',
  'symfony/monolog-bundle' => 'v3.4.0@7fbecb371c1c614642c93c6b2cbcdf723ae8809d',
  'symfony/phpunit-bridge' => 'v4.3.4@3b1ab2e027d7c5af0e693c4a5b4ba5d407f1814d',
  'symfony/profiler-pack' => 'v1.0.4@99c4370632c2a59bb0444852f92140074ef02209',
  'symfony/test-pack' => 'v1.0.6@ff87e800a67d06c423389f77b8209bc9dc469def',
  'symfony/var-dumper' => 'v4.2.11@4e18e041a477edbb8c54e053f179672f9413816c',
  'symfony/web-profiler-bundle' => 'v4.2.11@e7b916235f8a1d33010ab707fb08943cf8573c1e',
  'symfony/web-server-bundle' => 'v4.2.11@91945ba7f59f2a4b4194f018da9d7aaedaf88418',
  'paragonie/random_compat' => '2.*@aa7a9809abdda0b93e81efbec1d6c5f2527ee54a',
  'symfony/polyfill-ctype' => '*@aa7a9809abdda0b93e81efbec1d6c5f2527ee54a',
  'symfony/polyfill-iconv' => '*@aa7a9809abdda0b93e81efbec1d6c5f2527ee54a',
  'symfony/polyfill-php71' => '*@aa7a9809abdda0b93e81efbec1d6c5f2527ee54a',
  'symfony/polyfill-php70' => '*@aa7a9809abdda0b93e81efbec1d6c5f2527ee54a',
  'symfony/polyfill-php56' => '*@aa7a9809abdda0b93e81efbec1d6c5f2527ee54a',
  '__root__' => 'dev-master@aa7a9809abdda0b93e81efbec1d6c5f2527ee54a',
);

    private function __construct()
    {
    }

    /**
     * @throws \OutOfBoundsException If a version cannot be located.
     *
     * @psalm-param key-of<self::VERSIONS> $packageName
     */
    public static function getVersion(string $packageName) : string
    {
        if (isset(self::VERSIONS[$packageName])) {
            return self::VERSIONS[$packageName];
        }

        throw new \OutOfBoundsException(
            'Required package "' . $packageName . '" is not installed: check your ./vendor/composer/installed.json and/or ./composer.lock files'
        );
    }
}
