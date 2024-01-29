<?php

//========================================================================================

define("EM_RESULT_OK", 							0);
define("EM_RESULT_ERROR", 						1);
define("EM_RESULT_ERROR_WRONG_PARAMS", 			2);
define("EM_RESULT_ERROR_INITIALIZED", 			3);

//----------------------------------------------------------------------------------------

define("EU_ERROR_NONE",							0x0000);
define("EU_ERROR_UNKNOWN",						0xFFFF);
define("EU_ERROR_NOT_SUPPORTED",				0xFFFE);

define("EU_ERROR_NOT_INITIALIZED",				0x0001);
define("EU_ERROR_BAD_PARAMETER",				0x0002);
define("EU_ERROR_LIBRARY_LOAD",					0x0003);
define("EU_ERROR_READ_SETTINGS",				0x0004);
define("EU_ERROR_TRANSMIT_REQUEST",				0x0005);
define("EU_ERROR_MEMORY_ALLOCATION",			0x0006);
define("EU_WARNING_END_OF_ENUM",				0x0007);
define("EU_ERROR_PROXY_NOT_AUTHORIZED",			0x0008);
define("EU_ERROR_NO_GUI_DIALOGS",				0x0009);
define("EU_ERROR_DOWNLOAD_FILE",				0x000A);
define("EU_ERROR_WRITE_SETTINGS",				0x000B);
define("EU_ERROR_CANCELED_BY_GUI",				0x000C);
define("EU_ERROR_OFFLINE_MODE",					0x000D);

define("EU_ERROR_KEY_MEDIAS_FAILED",			0x0011);
define("EU_ERROR_KEY_MEDIAS_ACCESS_FAILED",		0x0012);
define("EU_ERROR_KEY_MEDIAS_READ_FAILED",		0x0013);
define("EU_ERROR_KEY_MEDIAS_WRITE_FAILED",		0x0014);
define("EU_WARNING_KEY_MEDIAS_READ_ONLY",		0x0015);
define("EU_ERROR_KEY_MEDIAS_DELETE",			0x0016);
define("EU_ERROR_KEY_MEDIAS_CLEAR",				0x0017);
define("EU_ERROR_BAD_PRIVATE_KEY",				0x0018);

define("EU_ERROR_PKI_FORMATS_FAILED",			0x0021);
define("EU_ERROR_CSP_FAILED",					0x0022);
define("EU_ERROR_BAD_SIGNATURE",				0x0023);
define("EU_ERROR_AUTH_FAILED",					0x0024);
define("EU_ERROR_NOT_RECEIVER",					0x0025);

define("EU_ERROR_STORAGE_FAILED",				0x0031);
define("EU_ERROR_BAD_CERT",						0x0032);
define("EU_ERROR_CERT_NOT_FOUND",				0x0033);
define("EU_ERROR_INVALID_CERT_TIME",			0x0034);
define("EU_ERROR_CERT_IN_CRL",					0x0035);
define("EU_ERROR_BAD_CRL",						0x0036);
define("EU_ERROR_NO_VALID_CRLS",				0x0037);

define("EU_ERROR_GET_TIME_STAMP",				0x0041);
define("EU_ERROR_BAD_TSP_RESPONSE",				0x0042);
define("EU_ERROR_TSP_SERVER_CERT_NOT_FOUND",	0x0043);
define("EU_ERROR_TSP_SERVER_CERT_INVALID",		0x0044);

define("EU_ERROR_GET_OCSP_STATUS",				0x0051);
define("EU_ERROR_BAD_OCSP_RESPONSE",			0x0052);
define("EU_ERROR_CERT_BAD_BY_OCSP",				0x0053);
define("EU_ERROR_OCSP_SERVER_CERT_NOT_FOUND",	0x0054);
define("EU_ERROR_OCSP_SERVER_CERT_INVALID",		0x0055);

define("EU_ERROR_LDAP_ERROR",					0x0061);

//========================================================================================

define("EM_ENCODING_CP1251",					1251);
define("EM_ENCODING_UTF8",						65001);

//========================================================================================

define("EU_CERT_KEY_TYPE_UNKNOWN",				0x00);
define("EU_CERT_KEY_TYPE_DSTU4145",				0x01);
define("EU_CERT_KEY_TYPE_RSA",					0x02);
define("EU_CERT_KEY_TYPE_ECDSA",				0x04);

define("EU_KEY_USAGE_UNKNOWN",					0x0000);
define("EU_KEY_USAGE_DIGITAL_SIGNATURE",		0x0001);
define("EU_KEY_USAGE_NON_REPUDATION",			0x0002);
define("EU_KEY_USAGE_KEY_AGREEMENT",			0x0010);

define("EU_RECIPIENT_APPEND_TYPE_BY_ISSUER_SERIAL",	0x01);
define("EU_RECIPIENT_APPEND_TYPE_BY_KEY_ID",		0x02);

define("EU_SUBJECT_TYPE_UNDIFFERENCED",			0);
define("EU_SUBJECT_TYPE_CA",					1);
define("EU_SUBJECT_TYPE_CA_SERVER",				2);
define("EU_SUBJECT_TYPE_RA_ADMINISTRATOR",		3);
define("EU_SUBJECT_TYPE_END_USER",				4);

define("EU_SUBJECT_CA_SERVER_SUB_TYPE_UNDIFFERENCED",	0);
define("EU_SUBJECT_CA_SERVER_SUB_TYPE_CMP",				1);
define("EU_SUBJECT_CA_SERVER_SUB_TYPE_TSP",				2);
define("EU_SUBJECT_CA_SERVER_SUB_TYPE_OCSP",			3);

define("EU_CTX_HASH_ALGO_UNKNOWN",				0x00);
define("EU_CTX_HASH_ALGO_GOST34311",			0x01);
define("EU_CTX_HASH_ALGO_SHA160",				0x02);
define("EU_CTX_HASH_ALGO_SHA224",				0x03);
define("EU_CTX_HASH_ALGO_SHA256",				0x04);
define("EU_CTX_HASH_ALGO_SHA384",				0x05);
define("EU_CTX_HASH_ALGO_SHA512",				0x06);
define("EU_CTX_HASH_ALGO_DSTU7564_256",			0x07);
define("EU_CTX_HASH_ALGO_DSTU7564_384",			0x08);
define("EU_CTX_HASH_ALGO_DSTU7564_512",			0x09);

define("EU_CTX_SIGN_UNKNOWN",					0x00);
define("EU_CTX_SIGN_DSTU4145_WITH_GOST34311",	0x01);
define("EU_CTX_SIGN_RSA_WITH_SHA",				0x02);
define("EU_CTX_SIGN_ECDSA_WITH_SHA",			0x03);
define("EU_CTX_SIGN_DSTU4145_WITH_DSTU7564",	0x04);

define("EU_RESOLVE_OIDS_PARAMETER", 			"ResolveOIDs");
define("EU_SIGN_INCLUDE_CONTENT_TIME_STAMP_PARAMETER", 
												"SignIncludeContentTimeStamp");
define("EU_SIGN_TYPE_PARAMETER",				"SignType");
define("EU_SIGN_INCLUDE_CA_CERTIFICATES_PARAMETER",
												"SignIncludeCACertificates");
define("EU_CHECK_CERT_CHAIN_ON_SIGN_TIME_PARAMETER",
												"CheckCertChainOnSignTime");
define("EU_CONNECTIONS_TIMEOUT_PARAMETER",		"ConnectionsTimeout");
define("EU_LOG_EVENTS_THRESHOLD_PARAMETER",		"LogEventsThreshold");

define("EU_CHECK_PRIVATE_KEY_CONTEXT_PARAMETER","CheckPrivateKey");
define("EU_RESOLVE_OIDS_CONTEXT_PARAMETER",		"ResolveOIDs");
define("EU_EXPORATABLE_CONTEXT_CONTEXT_PARAMETER",
												"ExportableContext");

define("EU_SIGN_TYPE_UNKNOWN",					0x00);
define("EU_SIGN_TYPE_CADES_BES",				0x01);
define("EU_SIGN_TYPE_CADES_T",					0x04);
define("EU_SIGN_TYPE_CADES_C",					0x08);
define("EU_SIGN_TYPE_CADES_X_LONG",				0x10);

define("EU_OID_EXT_KEY_USAGE_STAMP", 			"1.2.804.2.1.1.1.3.9");

define("EU_USER_INFO_VERSION_1",				1);
define("EU_USER_INFO_VERSION_2",				2);
define("EU_USER_INFO_VERSION",					3);

define("EU_KEYS_TYPE_NONE",						0x00);
define("EU_KEYS_TYPE_DSTU_AND_ECDH_WITH_GOSTS",	0x01);
define("EU_KEYS_TYPE_RSA_WITH_SHA",				0x02);
define("EU_KEYS_TYPE_ECDSA_WITH_SHA",			0x04);
define("EU_KEYS_TYPE_DSTU_AND_ECDH_WITH_DSTU",	0x08);

define("EU_KEYS_LENGTH_DS_UA_191",				0x01);
define("EU_KEYS_LENGTH_DS_UA_257",				0x02);
define("EU_KEYS_LENGTH_DS_UA_307",				0x03);
define("EU_KEYS_LENGTH_DS_UA_FILE",				0x04);
define("EU_KEYS_LENGTH_DS_UA_CERT",				0x05);

define("EU_KEYS_LENGTH_KEP_UA_257",				0x01);
define("EU_KEYS_LENGTH_KEP_UA_431",				0x02);
define("EU_KEYS_LENGTH_KEP_UA_571",				0x03);
define("EU_KEYS_LENGTH_KEP_UA_FILE",			0x04);
define("EU_KEYS_LENGTH_KEP_UA_CERT",			0x05);

define("EU_KEYS_LENGTH_DS_RSA_1024",			0x01);
define("EU_KEYS_LENGTH_DS_RSA_2048",			0x02);
define("EU_KEYS_LENGTH_DS_RSA_3072",			0x03);
define("EU_KEYS_LENGTH_DS_RSA_4096",			0x04);
define("EU_KEYS_LENGTH_DS_FILE",				0x05);
define("EU_KEYS_LENGTH_DS_RSA_FILE",			0x05);
define("EU_KEYS_LENGTH_DS_RSA_CERT",			0x06);

define("EU_KEYS_LENGTH_DS_ECDSA_192",			0x01);
define("EU_KEYS_LENGTH_DS_ECDSA_256",			0x02);
define("EU_KEYS_LENGTH_DS_ECDSA_384",			0x03);
define("EU_KEYS_LENGTH_DS_ECDSA_521",			0x04);
define("EU_KEYS_LENGTH_DS_ECDSA_FILE",			0x05);
define("EU_KEYS_LENGTH_DS_ECDSA_CERT",			0x06);

//========================================================================================

?>