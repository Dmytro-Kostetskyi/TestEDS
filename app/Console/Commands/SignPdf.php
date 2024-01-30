<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SignPdf extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sign:pdf';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';
    private $password = 'Ukrfin2024';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $iErrorCode = 0;

        euspe_setcharset(EM_ENCODING_UTF8);

        $keyPath = storage_path('app/key.jks');
        $keyByteString = file_get_contents($keyPath, FILE_BINARY);

        $pdfPath = storage_path('app/Test.pdf');
        $pdfSignPath = storage_path('app/File-signed-' . date('Y-m-d-H-i-s') . '.pdf');

        $iResult = euspe_init($iErrorCode);
        print $iResult ? $this->getError($iErrorCode) : 'The library was successfully initialized ';
        euspe_setruntimeparameter(EU_RESOLVE_OIDS_PARAMETER, false, $iErrorCode);
        print $iResult ? $this->getError($iErrorCode) : 'The parameter EU_RESOLVE_OIDS_PARAMETER was successfully set ';
        euspe_setruntimeparameter(EU_SIGN_TYPE_PARAMETER, EU_SIGN_TYPE_CADES_X_LONG, $iErrorCode);
        print $iResult ? $this->getError($iErrorCode) : 'The parameter EU_SIGN_TYPE_PARAMETER was successfully set ';

        $iResult = euspe_readprivatekeybinary(
            $keyByteString, $this->password, $iErrorCode
        );
        print $iResult ? $this->getError($iErrorCode) : 'The key was successfully loaded ';
        ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//         Формування ЕЦП файлу (Примітка: Розмір файла не обмежений)
        $bExternal = false;
        euspe_signfile(
            $pdfPath,        // Вхідний. Ім’я файлу з даними
            $pdfSignPath,// Вхідний. Ім’я файлу, в який необхідно записати підпис (якщо тип підпису зовнішній) або підписані дані (якщо тип підпису внутрішній)
            $bExternal,        // Вхідний. Тип ЕЦП (зовнішний або внутрішній)
            $iErrorCode        // Вихідний. Код помилки
        );

        print $iResult ? $this->getError($iErrorCode) : 'The file (' . $pdfSignPath . ') was successfully signed  ';
        return 0;


        $result = null;
        $context = 0;

//        euspe_setcharset(EM_ENCODING_UTF8);
//
//        $pdfPath = storage_path('app/Test.pdf');
//        $pdfSignPath = storage_path('app/File-signed-'.date('Y-m-d-H-i-s').'.pdf');
//        $pdfByteString = file_get_contents($pdfPath, FILE_BINARY);
//
//        $keyPath = storage_path('app/key.jks');
//        $keyByteString = file_get_contents($keyPath, FILE_BINARY);
//
//        $iErrorCode = 0;
//        $iResult = euspe_init($iErrorCode);
//
//        $iErrorCode1 = 0;
//        euspe_setruntimeparameter(EU_RESOLVE_OIDS_PARAMETER, false, $iErrorCode);
//        euspe_setruntimeparameter(EU_SIGN_TYPE_PARAMETER, EU_SIGN_TYPE_CADES_X_LONG, $iErrorCode);
//
//        $iResult = euspe_readprivatekeybinary(
//            $keyByteString, $this->password, $iErrorCode1
//        );
//
//        print $iResult? $this->getError($iErrorCode): 'The key was successfully loaded ';
//;
//        ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//
//
////         Формування ЕЦП файлу (Примітка: Розмір файла не обмежений)
//        $bExternal = false;
//        euspe_signfile(
//            $pdfPath,        // Вхідний. Ім’я файлу з даними
//            $pdfSignPath,// Вхідний. Ім’я файлу, в який необхідно записати підпис (якщо тип підпису зовнішній) або підписані дані (якщо тип підпису внутрішній)
//            $bExternal,        // Вхідний. Тип ЕЦП (зовнішний або внутрішній)
//            $iErrorCode        // Вихідний. Код помилки
//        );
//
//        print $iResult? $this->getError($iErrorCode): 'The file ('.$pdfSignPath.') was successfully signed  ';
//        return 0;
//
//
//        $result = null;
//        $context = 0;


//                $pdfByteStringResult = '';
//
//        euspe_signcreateext(
//            $pdfByteString, $pdfByteStringResult, $iErrorCode1
//        );


//        /*
//         * $iResult = euspe_verifyfile(
//	$sFileWithSigData, $sFileWithVerData,
//	$sSignTime, $bIsTSPUse,
//	$spIssuer, $spIssuerCN, $spSerial,
//	$spSubject, $spSubjCN,
//	$spSubjOrg, $spSubjOrgUnit,
//	$spSubjTitle, $spSubjState,
//	$spSubjLocality, $spSubjFullName,
//	$spSubjAddress, $spSubjPhone,
//	$spSubjEMail, $spSubjDNS,
//	$spSubjEDRPOUCode, $spSubjDRFOCode,
//	$iErrorCode);
//         */
//
//        $sFileWithSigData = storage_path('app/Test.pdf.p7s');
//        $sFileWithVerData = storage_path('app/Te1234234324234234234423.pdf');
//        $sSignTime = '';
//        $bIsTSPUse = false;
//        $spIssuer = '';
//        $spIssuerCN = '';
//        $spSerial = '';
//        $spSubject = '';
//        $spSubjCN = '';
//        $spSubjOrg = '';
//        $spSubjOrgUnit = '';
//        $spSubjTitle = '';
//        $spSubjState = '';
//        $spSubjLocality = '';
//        $spSubjFullName = '';
//        $spSubjAddress = '';
//        $spSubjPhone = '';
//        $spSubjEMail = '';
//        $spSubjDNS = '';
//        $spSubjEDRPOUCode = '';
//        $spSubjDRFOCode = '';
//        $iErrorCode = 0;
//
//        $iResult = euspe_verifyfile(
//            $sFileWithSigData, $sFileWithVerData,
//            $sSignTime, $bIsTSPUse,
//            $spIssuer, $spIssuerCN, $spSerial,
//            $spSubject, $spSubjCN,
//            $spSubjOrg, $spSubjOrgUnit,
//            $spSubjTitle, $spSubjState,
//            $spSubjLocality, $spSubjFullName,
//            $spSubjAddress, $spSubjPhone,
//            $spSubjEMail, $spSubjDNS,
//            $spSubjEDRPOUCode, $spSubjDRFOCode,
//            $iErrorCode);
//
//        $this->print_result('Signer info', '');
//        $this->print_result('&nbsp&nbsp&nbsp&nbsp$sSignTime', $sSignTime);
//        $this->print_result('&nbsp&nbsp&nbsp&nbsp$bIsTSPUse', $bIsTSPUse);
//        $this->print_result('&nbsp&nbsp&nbsp&nbsp$spIssuer', $spIssuer);
//        $this->print_result('&nbsp&nbsp&nbsp&nbsp$spIssuerCN', $spIssuerCN);
//        $this->print_result('&nbsp&nbsp&nbsp&nbsp$spSerial', $spSerial);
//        $this->print_result('&nbsp&nbsp&nbsp&nbsp$spSubject', $spSubject);
//        $this->print_result('&nbsp&nbsp&nbsp&nbsp$spSubjCN', $spSubjCN);
//        $this->print_result('&nbsp&nbsp&nbsp&nbsp$spSubjOrg', $spSubjOrg);
//        $this->print_result('&nbsp&nbsp&nbsp&nbsp$spSubjOrgUnit', $spSubjOrgUnit);
//        $this->print_result('&nbsp&nbsp&nbsp&nbsp$spSubjTitle', $spSubjTitle);
//        $this->print_result('&nbsp&nbsp&nbsp&nbsp$spSubjState', $spSubjState);
//        $this->print_result('&nbsp&nbsp&nbsp&nbsp$spSubjLocality', $spSubjLocality);
//        $this->print_result('&nbsp&nbsp&nbsp&nbsp$spSubjFullName', $spSubjFullName);
//        $this->print_result('&nbsp&nbsp&nbsp&nbsp$spSubjAddress', $spSubjAddress);
//        $this->print_result('&nbsp&nbsp&nbsp&nbsp$spSubjPhone', $spSubjPhone);
//        $this->print_result('&nbsp&nbsp&nbsp&nbsp$spSubjEMail', $spSubjEMail);
//        $this->print_result('&nbsp&nbsp&nbsp&nbsp$spSubjDNS', $spSubjDNS);
//        $this->print_result('&nbsp&nbsp&nbsp&nbsp$spSubjEDRPOUCode', $spSubjEDRPOUCode);
//        $this->print_result('&nbsp&nbsp&nbsp&nbsp$spSubjDRFOCode', $spSubjDRFOCode);
//        $this->print_result('&nbsp&nbsp&nbsp&nbsp$iErrorCode', $iErrorCode);
//
//        ////////////////////////////////////////////////////////////////////////////////////////////////////


        /**
         * // Перевірка внутрішнього (підпис знаходиться разом із даними) електронного
         * // цифрового підпису (ЕЦП)
         * integer euspe_signverify(
         * string_b    sSignData,        // Вхідний. Дані із підписом
         * string    sSignTime        // Вихідний. Час підпису в форматі
         * // MM.DD.YYYY HH:ii:ss
         * bool        bUseTSP        // Вихідний. Чи використовувався TSP
         * string    sIssuer        //* Вихідний. Видавник сертифікату
         * string    sIssuerCN        //* Вихідний. Загальне ім’я видавника
         * string    sSerial        //* Вихідний. Серійний номер сертифікату
         * string    sSubject        //* Вихідний. Власник сертифікату
         * string    sSubjCN        // Вихідний. Загальне ім’я власника
         * string    sSubjOrg        //* Вихідний. Організація
         * string    sSubjOrgUnit    //* Вихідний. Підрозділ
         * string    sSubjTitle        //* Вихідний. Посада
         * string    sSubjState        //* Вихідний. Область
         * string    sSubjLocality    //* Вихідний. Місто
         * string    sSubjFullName    //* Вихідний. Повне ім’я
         * string    sSubjAddress    //* Вихідний. Адреса
         * string    sSubjPhone        //* Вихідний. Телефон
         * string    sSubjEMail        //* Вихідний. E-mail
         * string    sSubjDNS        //* Вихідний. DNS
         * string    sSubjEDRPOUCode    //* Вихідний. ЄДРПОУ код
         * string    sSubjDRFOCode    //* Вихідний. ДРФО код
         * string_b    sResultData        //* Вихідний. Перевірені дані
         * integer    iErrorCode        // Вихідний. Код помилки
         * );
         */

        $sSignTime = '';
        $bUseTSP = false;
        $sIssuer = '';
        $sIssuerCN = '';
        $sSerial = '';
        $sSubject = '';
        $sSubjCN = '';
        $sSubjOrg = '';
        $sSubjOrgUnit = '';
        $sSubjTitle = '';
        $sSubjState = '';
        $sSubjLocality = '';
        $sSubjFullName = '';
        $sSubjAddress = '';
        $sSubjPhone = '';
        $sSubjEMail = '';
        $sSubjDNS = '';
        $sSubjEDRPOUCode = '';
        $sSubjDRFOCode = '';
        $sResultData = '';
        $iErrorCode = 0;

        $sFileWithSigData = storage_path('app/Test.pdf.p7s');
//        $sFileWithSigData = storage_path('app/Test-sign-by-local.pdf');
//        $sFileWithVerData = storage_path('app/Te1234234324234234234423.pdf');

        $pdfByteString = file_get_contents($sFileWithSigData, FILE_BINARY);

        $iResult = euspe_signverify(
            $pdfByteString, $sSignTime, $bUseTSP,
            $sIssuer, $sIssuerCN, $sSerial,
            $sSubject, $sSubjCN,
            $sSubjOrg, $sSubjOrgUnit,
            $sSubjTitle, $sSubjState,
            $sSubjLocality, $sSubjFullName,
            $sSubjAddress, $sSubjPhone,
            $sSubjEMail, $sSubjDNS,
            $sSubjEDRPOUCode, $sSubjDRFOCode,
            $sResultData, $iErrorCode);

        $this->print_result('Signer info', '');
        $this->print_result('&nbsp&nbsp&nbsp&nbsp$sSignTime', $sSignTime);
        $this->print_result('&nbsp&nbsp&nbsp&nbsp$bUseTSP', $bUseTSP);
        $this->print_result('&nbsp&nbsp&nbsp&nbsp$sIssuer', $sIssuer);
        $this->print_result('&nbsp&nbsp&nbsp&nbsp$sIssuerCN', $sIssuerCN);
        $this->print_result('&nbsp&nbsp&nbsp&nbsp$sSerial', $sSerial);
        $this->print_result('&nbsp&nbsp&nbsp&nbsp$sSubject', $sSubject);
        $this->print_result('&nbsp&nbsp&nbsp&nbsp$sSubjCN', $sSubjCN);
        $this->print_result('&nbsp&nbsp&nbsp&nbsp$sSubjOrg', $sSubjOrg);
        $this->print_result('&nbsp&nbsp&nbsp&nbsp$sSubjOrgUnit', $sSubjOrgUnit);
        $this->print_result('&nbsp&nbsp&nbsp&nbsp$sSubjTitle', $sSubjTitle);
        $this->print_result('&nbsp&nbsp&nbsp&nbsp$sSubjState', $sSubjState);
        $this->print_result('&nbsp&nbsp&nbsp&nbsp$sSubjLocality', $sSubjLocality);
        $this->print_result('&nbsp&nbsp&nbsp&nbsp$sSubjFullName', $sSubjFullName);
        $this->print_result('&nbsp&nbsp&nbsp&nbsp$sSubjAddress', $sSubjAddress);
        $this->print_result('&nbsp&nbsp&nbsp&nbsp$sSubjPhone', $sSubjPhone);
        $this->print_result('&nbsp&nbsp&nbsp&nbsp$sSubjEMail', $sSubjEMail);
        $this->print_result('&nbsp&nbsp&nbsp&nbsp$sSubjDNS', $sSubjDNS);
        $this->print_result('&nbsp&nbsp&nbsp&nbsp$sSubjEDRPOUCode', $sSubjEDRPOUCode);
        $this->print_result('&nbsp&nbsp&nbsp&nbsp$sSubjDRFOCode', $sSubjDRFOCode);
        $this->print_result('&nbsp&nbsp&nbsp&nbsp$sResultData', $sResultData);
        $this->print_result('&nbsp&nbsp&nbsp&nbsp$iErrorCode', $iErrorCode);


//        $sFilePDF = storage_path('app/Test.pdf');
//        $sFileSignedPDF = storage_path('app/Test_signed_SIGN_TYPE.pdf');
//
//        $sTAB = '&nbsp&nbsp&nbsp&nbsp';
//
//
//        $iSignLevel = EU_SIGN_TYPE_CADES_X_LONG;
//        $sPDFData = '';
//        $sSignedPDFData = '';
//        $iSignsCount = 0;
//
//        $sPDFData = file_get_contents($sFilePDF, FILE_USE_INCLUDE_PATH);
//
//        $iResult = euspe_pdfsigndata(
//            $pdfByteString, $iSignLevel,
//            $sSignedPDFData, $iErrorCode);
//
//        file_put_contents($sFileSignedPDF, $sSignedPDFData, FILE_BINARY);
//        $this->print_result('Signed PDF file', $sFileSignedPDF);
//
//        $iResult = euspe_pdfgetsignscount(
//            $sSignedPDFData, $iSignsCount, $iErrorCode);
//
//
//
//        for ($iSignIndex = 0; $iSignIndex < $iSignsCount; $iSignIndex++)
//        {
//            $iResult = euspe_pdfgetsigntype(
//                $iSignIndex, $sSignedPDFData, $iSignLevel, $iErrorCode);
//
//
//
//            $this->print_result('SignLevel', $iSignLevel);
//
//            $signerInfo = '';
//            $sSignerCert = '';
//
//            $iResult = euspe_pdfgetsignerinfo(
//                $iSignIndex, $sSignedPDFData,
//                $signerInfo, $sSignerCert, $iErrorCode);
//
//
//
//            $this->print_result('Signer certificate info-'.($iSignIndex + 1), '');
//            var_dump($signerInfo);
//            echo "<br>";
//
//            $sCertFileName = './EU-'.$signerInfo['serial'].'.cer';
//            file_put_contents($sCertFileName, $sSignerCert);
//            $this->print_result('Signer certificate file', $sCertFileName);
//
//            $timeInfo = '';
//
//            $iResult = euspe_pdfgetsigntimeinfo(
//                $iSignIndex, $sSignedPDFData, $timeInfo, $iErrorCode);
//
//
//
//            $this->print_result('Sign time info', '');
//            var_dump($timeInfo);
//            echo "<br>";
//
//            $iResult = euspe_pdfverifydata(
//                $iSignIndex, $sSignedPDFData,
//                $sSignTime, $bIsTSPUse,
//                $spIssuer, $spIssuerCN, $spSerial,
//                $spSubject, $spSubjCN,
//                $spSubjOrg, $spSubjOrgUnit,
//                $spSubjTitle, $spSubjState,
//                $spSubjLocality, $spSubjFullName,
//                $spSubjAddress, $spSubjPhone,
//                $spSubjEMail, $spSubjDNS,
//                $spSubjEDRPOUCode, $spSubjDRFOCode,
//                $iErrorCode);
//
//
//
//            $this->print_result('Signer info', '');
//            $this->print_result($sTAB.'subject', $spSubjCN);
//            $this->print_result($sTAB.'serial', $spSerial);
//            $this->print_result($sTAB.'issuer', $spIssuerCN);
//        }


//        Working

//        euspe_signcreate(
//            $pdfByteString, $result, $iErrorCode
//        );
//
//        file_put_contents(
//            storage_path('app/Test_signed.pdf'),
//            $result,
//            FILE_BINARY
//        );
//
//        dd($this->getError($iErrorCode));


        //Working

//        $this->handleResult('ctxcreate', euspe_ctxcreate($context, $iErrorCode), $iErrorCode);
//
//        $this->handleResult(
//            'ctxreadprivatekeybinary',
//            euspe_ctxreadprivatekeybinary(
//                $context,
//                $keyByteString,
//                $this->password,
//                $pkContext,
//                $iErrorCode),
//            $iErrorCode
//        );
//
//        $this->handleResult(
//            'ctxsigndata',
//            euspe_ctxsigndata($pkContext, EU_CTX_SIGN_DSTU4145_WITH_GOST34311, $pdfByteString, false, true, $sSign, $iErrorCode),
//            $iErrorCode
//        );
//        $this->handleResult(
//            'ctxisalreadysigned',
//            euspe_ctxisalreadysigned($pkContext, EU_CTX_SIGN_DSTU4145_WITH_GOST34311, $sSign, $bIsAlreadySigned, $iErrorCode),
//            $iErrorCode
//        );
//        if (!$bIsAlreadySigned) {
//            throw new Exception('Content not signed properly.');
//        }
//        $this->handleResult('ctxfreeprivatekey', euspe_ctxfreeprivatekey($pkContext));
//        $this->handleResult('ctxfree', euspe_ctxfree($context));
////dd($pdfByteString, $sSign);
//        file_put_contents(
//            $pdfSignPath,
//            $sSign,
//            FILE_BINARY
//        );
//        return $sSign;


//        $iSignLevel = EU_KEYS_TYPE_DSTU_AND_ECDH_WITH_DSTU;
//        $sPDFData = '';
//        $sSignedPDFData = '';
//        $iSignsCount = 0;
//
//        $sPDFData = file_get_contents($pdfPath, FILE_USE_INCLUDE_PATH);
//
//        $iResult = euspe_pdfsigndata(
//            $pdfByteString, $iSignLevel,
//            $sSignedPDFData, $iErrorCode);
//
//
//        file_put_contents($pdfSignPath, $sSignedPDFData);
//        $this->print_result('Signed PDF file', $pdfSignPath);


        euspe_finalize();
        dd($this->getError($iErrorCode));


        euspe_finalize();
//
//
//        phpinfo();
//        $iResult = euspe_readprivatekeyfile(
//            '$sPrivateKey', '$sPrivateKeyPassword', '$iErrorCode');
//        dd($iResult);
//        EULoader::load();

        //

    }


    function print_result($sMsg, $sResultMsg)
    {
        $sColor = "#000FF0";
        $sSeparator = " - ";

        if ($sResultMsg == '')
            $sSeparator = ' : ';

        echo "EUSignPHP: " . $sMsg . $sSeparator . "-----------" . $sResultMsg . "\n";
    }

    public function getError(int $code)
    {
        $message = '';
        euspe_setcharset(EM_ENCODING_UTF8);
        euspe_geterrdescr($code, $message);

        return mb_detect_encoding($message);

    }

    public function strToBin($str)
    {
        $arr = str_split($str);
        $str = '';
        foreach ($arr as $char) {
            $str .= sprintf('%08b', ord($char));
        }
        return $str;
    }

    private function handleResult(
        string $command,
               $iResult,
        int    $iErrorCode = null,
        array  $aAcceptableErrorCodes = []
    ): bool
    {
        if ($iResult != EM_RESULT_OK && !in_array($iErrorCode, $aAcceptableErrorCodes)) {
            euspe_geterrdescr($iErrorCode, $sErrorDescription);
            throw new \RuntimeException('Check the correctness of functions invocation order.' .
                ' Code: 0x00' . dechex($iErrorCode) . ' Description: ' . $sErrorDescription);
        }
        if (!empty($iErrorCode) && !in_array($iErrorCode, $aAcceptableErrorCodes)) {
            euspe_geterrdescr($iErrorCode, $sErrorDescription);
            $utfEncoding = 'utf-8';
            throw new Exception(
                sprintf(
                    'Result: %s Code: %s Command: %s Error: %s. Check error in EUSignConsts.php by code.',
                    dechex($iResult),
                    dechex($iErrorCode),
                    $command,
                    ($encoding = mb_detect_encoding($sErrorDescription)) && strtolower($encoding) !== $utfEncoding ?
                        mb_convert_encoding($sErrorDescription, $encoding, $utfEncoding) :
                        $sErrorDescription
                )
            );
        }
        return $iResult;
    }
}
