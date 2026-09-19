<?php

namespace Qdequippe\Yousign\Api\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Qdequippe\Yousign\Api\Model\ActivateSignatureRequest;
use Qdequippe\Yousign\Api\Model\AddonConsumption;
use Qdequippe\Yousign\Api\Model\Address;
use Qdequippe\Yousign\Api\Model\AnalysisType;
use Qdequippe\Yousign\Api\Model\AnalysisTypeMultipart;
use Qdequippe\Yousign\Api\Model\Approver;
use Qdequippe\Yousign\Api\Model\ApproverInfo;
use Qdequippe\Yousign\Api\Model\ApproverToNotify;
use Qdequippe\Yousign\Api\Model\ArchivedFile;
use Qdequippe\Yousign\Api\Model\AutoInsuranceClaimsHistoryCheck;
use Qdequippe\Yousign\Api\Model\AutoInsuranceClaimsHistoryCheckPolicyHolder;
use Qdequippe\Yousign\Api\Model\AutoInsuranceClaimsHistoryExtraction;
use Qdequippe\Yousign\Api\Model\AutoInsuranceClaimsHistoryExtractionDriversInformationInner;
use Qdequippe\Yousign\Api\Model\AutoInsuranceClaimsHistoryExtractionIncidentsInformationInner;
use Qdequippe\Yousign\Api\Model\AutoInsuranceClaimsHistoryFull;
use Qdequippe\Yousign\Api\Model\BadRequestResponse;
use Qdequippe\Yousign\Api\Model\BankAccount;
use Qdequippe\Yousign\Api\Model\BankAccountFull;
use Qdequippe\Yousign\Api\Model\BankAccountFullAllOfData;
use Qdequippe\Yousign\Api\Model\BankAccountFullAllOfDataExtractedFromDocument;
use Qdequippe\Yousign\Api\Model\BankAccountLookupFull;
use Qdequippe\Yousign\Api\Model\BankAccountLookupFullData;
use Qdequippe\Yousign\Api\Model\BankAccountLookupFullDataExtractedFromDocument;
use Qdequippe\Yousign\Api\Model\BankAccountLookupMeta;
use Qdequippe\Yousign\Api\Model\BankAccountMeta;
use Qdequippe\Yousign\Api\Model\BusinessRegistrationCertificateCheck;
use Qdequippe\Yousign\Api\Model\BusinessRegistrationCertificateExtraction;
use Qdequippe\Yousign\Api\Model\BusinessRegistrationCertificateExtractionBranchDescription;
use Qdequippe\Yousign\Api\Model\BusinessRegistrationCertificateExtractionCompanyDescription;
use Qdequippe\Yousign\Api\Model\BusinessRegistrationCertificateFull;
use Qdequippe\Yousign\Api\Model\Checkbox;
use Qdequippe\Yousign\Api\Model\Checkbox1;
use Qdequippe\Yousign\Api\Model\Checkbox2;
use Qdequippe\Yousign\Api\Model\CompanyCertificateCheck;
use Qdequippe\Yousign\Api\Model\CompanyCertificateCheckLegalRepresentativesInner;
use Qdequippe\Yousign\Api\Model\CompanyCertificateExtraction;
use Qdequippe\Yousign\Api\Model\CompanyCertificateExtractionLegalRepresentativesInner;
use Qdequippe\Yousign\Api\Model\CompanyCertificateFull;
use Qdequippe\Yousign\Api\Model\CompanyFull;
use Qdequippe\Yousign\Api\Model\CompanyFullAllOfData;
use Qdequippe\Yousign\Api\Model\CompanyFullAllOfDataBeneficialOwners;
use Qdequippe\Yousign\Api\Model\CompanyFullAllOfDataCompanyInformation;
use Qdequippe\Yousign\Api\Model\CompanyFullAllOfDataCompanyInformationActivities;
use Qdequippe\Yousign\Api\Model\CompanyFullAllOfDataCompanyInformationCommercialRegistration;
use Qdequippe\Yousign\Api\Model\CompanyFullAllOfDataCompanyInformationLegalForm;
use Qdequippe\Yousign\Api\Model\CompanyFullAllOfDataExtractedFromDocument;
use Qdequippe\Yousign\Api\Model\CompanyFullAllOfDataHeadquarter;
use Qdequippe\Yousign\Api\Model\CompanyFullAllOfDataLegalRepresentatives;
use Qdequippe\Yousign\Api\Model\CompanyMeta;
use Qdequippe\Yousign\Api\Model\Consumption;
use Qdequippe\Yousign\Api\Model\ConsumptionApi;
use Qdequippe\Yousign\Api\Model\ConsumptionApp;
use Qdequippe\Yousign\Api\Model\ConsumptionAppQualifiedElectronicSignatureIdentificationMode;
use Qdequippe\Yousign\Api\Model\ConsumptionAppQualifiedElectronicSignatureIdentificationModeIdentityVerification;
use Qdequippe\Yousign\Api\Model\Contact;
use Qdequippe\Yousign\Api\Model\CreateApprover;
use Qdequippe\Yousign\Api\Model\CreateContact;
use Qdequippe\Yousign\Api\Model\CreateCustomExperience;
use Qdequippe\Yousign\Api\Model\CreateCustomExperienceEmbeddedPreparationNavigationBar;
use Qdequippe\Yousign\Api\Model\CreateCustomExperienceRedirectUrls;
use Qdequippe\Yousign\Api\Model\CreateCustomProperty;
use Qdequippe\Yousign\Api\Model\CreateDocumentFromJson;
use Qdequippe\Yousign\Api\Model\CreateDocumentFromMultipart;
use Qdequippe\Yousign\Api\Model\CreateDocumentFromMultipartInitials;
use Qdequippe\Yousign\Api\Model\CreateElectronicSealDocument;
use Qdequippe\Yousign\Api\Model\CreateElectronicSealFieldReadOnlyTextPayload;
use Qdequippe\Yousign\Api\Model\CreateElectronicSealFieldSealPayload;
use Qdequippe\Yousign\Api\Model\CreateElectronicSealFieldSealPayloadCaptionsInner;
use Qdequippe\Yousign\Api\Model\CreateElectronicSealImagePreviewPayload;
use Qdequippe\Yousign\Api\Model\CreateElectronicSealImagePreviewPayloadField;
use Qdequippe\Yousign\Api\Model\CreateElectronicSealImagePreviewPayloadFieldCaptionsInner;
use Qdequippe\Yousign\Api\Model\CreateElectronicSealPayload;
use Qdequippe\Yousign\Api\Model\CreateFieldFont;
use Qdequippe\Yousign\Api\Model\CreateFollowersInner;
use Qdequippe\Yousign\Api\Model\CreateLabel;
use Qdequippe\Yousign\Api\Model\CreateLegalPerson;
use Qdequippe\Yousign\Api\Model\CreateNaturalPerson;
use Qdequippe\Yousign\Api\Model\CreateSignatureDateFieldFont;
use Qdequippe\Yousign\Api\Model\CreateSignerConsentRequest;
use Qdequippe\Yousign\Api\Model\CreateSignerConsentRequestSettings;
use Qdequippe\Yousign\Api\Model\CreateSignerDocumentRequest;
use Qdequippe\Yousign\Api\Model\CreateUser;
use Qdequippe\Yousign\Api\Model\CreateWebhookSubscription;
use Qdequippe\Yousign\Api\Model\CreateWorkflowSession;
use Qdequippe\Yousign\Api\Model\CreateWorkflowSessionApplicantLegalPerson;
use Qdequippe\Yousign\Api\Model\CreateWorkflowSessionApplicantNaturalPerson;
use Qdequippe\Yousign\Api\Model\CreateWorkspace;
use Qdequippe\Yousign\Api\Model\CustomExperience;
use Qdequippe\Yousign\Api\Model\CustomExperienceEmbeddedPreparationNavigationBar;
use Qdequippe\Yousign\Api\Model\CustomExperienceRedirectUrls;
use Qdequippe\Yousign\Api\Model\CustomProperty;
use Qdequippe\Yousign\Api\Model\CustomPropertyInList;
use Qdequippe\Yousign\Api\Model\CustomPropertyList;
use Qdequippe\Yousign\Api\Model\CustomPropertyOption;
use Qdequippe\Yousign\Api\Model\CustomPropertyOptionInput;
use Qdequippe\Yousign\Api\Model\CustomPropertyOptionUpdate;
use Qdequippe\Yousign\Api\Model\CustomPropertyValue;
use Qdequippe\Yousign\Api\Model\CustomText;
use Qdequippe\Yousign\Api\Model\DeleteWorkspace;
use Qdequippe\Yousign\Api\Model\DetailedConsumption;
use Qdequippe\Yousign\Api\Model\DetailedLayout;
use Qdequippe\Yousign\Api\Model\Document;
use Qdequippe\Yousign\Api\Model\DocumentAnalysisCheck;
use Qdequippe\Yousign\Api\Model\DocumentAnalysisMeta;
use Qdequippe\Yousign\Api\Model\DocumentAnalysisMeta1;
use Qdequippe\Yousign\Api\Model\DocumentClassification;
use Qdequippe\Yousign\Api\Model\DocumentInitials;
use Qdequippe\Yousign\Api\Model\DocumentInitialsPerPageInner;
use Qdequippe\Yousign\Api\Model\DriverLicenceCheck;
use Qdequippe\Yousign\Api\Model\DriverLicenceExtraction;
use Qdequippe\Yousign\Api\Model\DriverLicenceFull;
use Qdequippe\Yousign\Api\Model\DuplicateASignatureRequest;
use Qdequippe\Yousign\Api\Model\ElectronicSeal;
use Qdequippe\Yousign\Api\Model\ElectronicSealAuditTrail;
use Qdequippe\Yousign\Api\Model\ElectronicSealDocument;
use Qdequippe\Yousign\Api\Model\ElectronicSealImage;
use Qdequippe\Yousign\Api\Model\ElectronicSealsConsumption;
use Qdequippe\Yousign\Api\Model\EmailNotification;
use Qdequippe\Yousign\Api\Model\EmailNotification1;
use Qdequippe\Yousign\Api\Model\EmbeddedPreparationLink;
use Qdequippe\Yousign\Api\Model\EmbeddedSignerWithSignatureLink;
use Qdequippe\Yousign\Api\Model\FieldAnswer;
use Qdequippe\Yousign\Api\Model\FieldCheckbox;
use Qdequippe\Yousign\Api\Model\FieldMention;
use Qdequippe\Yousign\Api\Model\FieldRadioButtonGroup;
use Qdequippe\Yousign\Api\Model\FieldRadioButtonGroupRadiosInner;
use Qdequippe\Yousign\Api\Model\FieldReadOnlyText;
use Qdequippe\Yousign\Api\Model\FieldSignature;
use Qdequippe\Yousign\Api\Model\FieldSignatureDate;
use Qdequippe\Yousign\Api\Model\FieldSignerEmail;
use Qdequippe\Yousign\Api\Model\FieldSignerName;
use Qdequippe\Yousign\Api\Model\FieldText;
use Qdequippe\Yousign\Api\Model\Follower;
use Qdequippe\Yousign\Api\Model\Font;
use Qdequippe\Yousign\Api\Model\FontVariants;
use Qdequippe\Yousign\Api\Model\ForbiddenResponse;
use Qdequippe\Yousign\Api\Model\FraudOnlyFull;
use Qdequippe\Yousign\Api\Model\FraudOnlyFullAllOfAnalysisType;
use Qdequippe\Yousign\Api\Model\FraudRiskAnalysis;
use Qdequippe\Yousign\Api\Model\FraudRiskAnalysisIndicatorsInner;
use Qdequippe\Yousign\Api\Model\FrenchInvoiceDocument;
use Qdequippe\Yousign\Api\Model\FrenchInvoiceExtraction;
use Qdequippe\Yousign\Api\Model\FrenchTaxNoticeDocument;
use Qdequippe\Yousign\Api\Model\FrenchTaxNoticeExtraction;
use Qdequippe\Yousign\Api\Model\FrenchTaxNoticeExtraction2dDoc;
use Qdequippe\Yousign\Api\Model\FrenchVehicleRegistrationDocument;
use Qdequippe\Yousign\Api\Model\FrenchVehicleRegistrationDocumentExtraction;
use Qdequippe\Yousign\Api\Model\FrenchVehicleRegistrationDocumentExtractionCoOwnerInformationInner;
use Qdequippe\Yousign\Api\Model\FrenchVehicleRegistrationDocumentExtractionOwnerInformation;
use Qdequippe\Yousign\Api\Model\FrenchVehicleRegistrationDocumentExtractionVehicleInformation;
use Qdequippe\Yousign\Api\Model\FrenchVehicleRegistrationDocumentExtractionVehicleMotorInformation;
use Qdequippe\Yousign\Api\Model\FromElectronicSealDocument;
use Qdequippe\Yousign\Api\Model\FromSignatureRequestDocument;
use Qdequippe\Yousign\Api\Model\GermanInvoiceDocument;
use Qdequippe\Yousign\Api\Model\GermanInvoiceExtraction;
use Qdequippe\Yousign\Api\Model\GermanProofOfAddressDocument;
use Qdequippe\Yousign\Api\Model\GermanProofOfAddressExtraction;
use Qdequippe\Yousign\Api\Model\GermanTaxNoticeDocument;
use Qdequippe\Yousign\Api\Model\GermanTaxNoticeExtraction;
use Qdequippe\Yousign\Api\Model\GetConsumptionAddon200Response;
use Qdequippe\Yousign\Api\Model\GetConsumptionDetail200Response;
use Qdequippe\Yousign\Api\Model\GetConsumptionsRecordsElectronicSeals200Response;
use Qdequippe\Yousign\Api\Model\GetConsumptionsRecordsIdentifications200Response;
use Qdequippe\Yousign\Api\Model\GetConsumptionsRecordsInvitedSigners200Response;
use Qdequippe\Yousign\Api\Model\GetContacts200Response;
use Qdequippe\Yousign\Api\Model\GetCustomExperiences200Response;
use Qdequippe\Yousign\Api\Model\GetDocumentAnalyses200Response;
use Qdequippe\Yousign\Api\Model\GetInvitations200Response;
use Qdequippe\Yousign\Api\Model\GetLabels200Response;
use Qdequippe\Yousign\Api\Model\GetMonitoringsNaturalPersons200Response;
use Qdequippe\Yousign\Api\Model\GetSignatureRequests200Response;
use Qdequippe\Yousign\Api\Model\GetSignatureRequests200ResponseMeta;
use Qdequippe\Yousign\Api\Model\GetSignatureRequestsIdLabels200Response;
use Qdequippe\Yousign\Api\Model\GetSignatureRequestsIdLabels200ResponseMeta;
use Qdequippe\Yousign\Api\Model\GetSignatureRequestsSignatureRequestIdDocumentsDocumentIdFields200Response;
use Qdequippe\Yousign\Api\Model\GetSignatureRequestsSignatureRequestIdFollowers200Response;
use Qdequippe\Yousign\Api\Model\GetSignatureRequestsSignatureRequestIdSignerConsentRequests200Response;
use Qdequippe\Yousign\Api\Model\GetSignatureRequestsSignatureRequestIdSignerDocumentRequests200Response;
use Qdequippe\Yousign\Api\Model\GetSignatureRequestsSignatureRequestIdSignersSignerIdDocuments200Response;
use Qdequippe\Yousign\Api\Model\GetTemplates200Response;
use Qdequippe\Yousign\Api\Model\GetUsers200Response;
use Qdequippe\Yousign\Api\Model\GetVerificationsBankAccountLookups200Response;
use Qdequippe\Yousign\Api\Model\GetVerificationsBankAccounts200Response;
use Qdequippe\Yousign\Api\Model\GetVerificationsCompanies200Response;
use Qdequippe\Yousign\Api\Model\GetVerificationsIdentityDocuments200Response;
use Qdequippe\Yousign\Api\Model\GetVerificationsIdentityVideos200Response;
use Qdequippe\Yousign\Api\Model\GetVerificationsProofsOfAddress200Response;
use Qdequippe\Yousign\Api\Model\GetVerificationsWatchlists200Response;
use Qdequippe\Yousign\Api\Model\GetWorkflowSessions200Response;
use Qdequippe\Yousign\Api\Model\GetWorkflowSessionsIdApplicants200Response;
use Qdequippe\Yousign\Api\Model\GetWorkflowTemplates200Response;
use Qdequippe\Yousign\Api\Model\GetWorkspaces200Response;
use Qdequippe\Yousign\Api\Model\IdDocumentExtraction;
use Qdequippe\Yousign\Api\Model\IdDocumentExtractionAddress;
use Qdequippe\Yousign\Api\Model\IdDocumentExtractionMrz;
use Qdequippe\Yousign\Api\Model\IdDocumentFull;
use Qdequippe\Yousign\Api\Model\IdentificationsConsumption;
use Qdequippe\Yousign\Api\Model\Identity;
use Qdequippe\Yousign\Api\Model\IdentityDocumentFull;
use Qdequippe\Yousign\Api\Model\IdentityDocumentFullAllOfData;
use Qdequippe\Yousign\Api\Model\IdentityDocumentFullAllOfDataExtractedFromDocument;
use Qdequippe\Yousign\Api\Model\IdentityDocumentFullAllOfDataExtractedFromDocumentMrz;
use Qdequippe\Yousign\Api\Model\IdentityDocumentMeta;
use Qdequippe\Yousign\Api\Model\IdentityVideoDocument;
use Qdequippe\Yousign\Api\Model\IdentityVideoFull;
use Qdequippe\Yousign\Api\Model\IdentityVideoFullAllOfData;
use Qdequippe\Yousign\Api\Model\IdentityVideoFullAllOfDataEvidence;
use Qdequippe\Yousign\Api\Model\IdentityVideoMeta;
use Qdequippe\Yousign\Api\Model\InitialsArea;
use Qdequippe\Yousign\Api\Model\InitiateAutoInsuranceClaimsHistory;
use Qdequippe\Yousign\Api\Model\InitiateAutoInsuranceClaimsHistoryChecks;
use Qdequippe\Yousign\Api\Model\InitiateAutoInsuranceClaimsHistoryChecksPolicyHolder;
use Qdequippe\Yousign\Api\Model\InitiateBankAccount;
use Qdequippe\Yousign\Api\Model\InitiateBankAccountFromApplicant;
use Qdequippe\Yousign\Api\Model\InitiateBankAccountLookupFromApplicant;
use Qdequippe\Yousign\Api\Model\InitiateBankAccountLookupWithLegalPerson;
use Qdequippe\Yousign\Api\Model\InitiateBankAccountLookupWithLegalPersonFromFile;
use Qdequippe\Yousign\Api\Model\InitiateBankAccountLookupWithLegalPersonLegalPerson;
use Qdequippe\Yousign\Api\Model\InitiateBankAccountLookupWithNaturalPerson;
use Qdequippe\Yousign\Api\Model\InitiateBankAccountLookupWithNaturalPersonFromFile;
use Qdequippe\Yousign\Api\Model\InitiateBankAccountLookupWithNaturalPersonNaturalPerson;
use Qdequippe\Yousign\Api\Model\InitiateBankAccountWithLegalPerson;
use Qdequippe\Yousign\Api\Model\InitiateBankAccountWithLegalPersonLegalPerson;
use Qdequippe\Yousign\Api\Model\InitiateBankAccountWithNaturalPerson;
use Qdequippe\Yousign\Api\Model\InitiateBankAccountWithNaturalPersonNaturalPerson;
use Qdequippe\Yousign\Api\Model\InitiateBusinessRegistrationCertificate;
use Qdequippe\Yousign\Api\Model\InitiateCompanyCertificate;
use Qdequippe\Yousign\Api\Model\InitiateCompanyCertificateChecks;
use Qdequippe\Yousign\Api\Model\InitiateCompanyCertificateChecksLegalRepresentativesInner;
use Qdequippe\Yousign\Api\Model\InitiateCompanyFromApplicant;
use Qdequippe\Yousign\Api\Model\InitiateCompanyFromFile;
use Qdequippe\Yousign\Api\Model\InitiateCompanyFromJson;
use Qdequippe\Yousign\Api\Model\InitiateDocumentAnalysisFromApplicant;
use Qdequippe\Yousign\Api\Model\InitiateDocumentAnalysisFromApplicantChecks;
use Qdequippe\Yousign\Api\Model\InitiateDocumentAnalysisFromApplicantChecksIncomeYearCheck;
use Qdequippe\Yousign\Api\Model\InitiateDriverLicence;
use Qdequippe\Yousign\Api\Model\InitiateFraudOnly;
use Qdequippe\Yousign\Api\Model\InitiateFraudOnlyAnalysisType;
use Qdequippe\Yousign\Api\Model\InitiateIdDocument;
use Qdequippe\Yousign\Api\Model\InitiateIdentityDocument;
use Qdequippe\Yousign\Api\Model\InitiateIdentityDocumentFromApplicant;
use Qdequippe\Yousign\Api\Model\InitiateIdentityDocumentWithoutName;
use Qdequippe\Yousign\Api\Model\InitiateIdentityVideo;
use Qdequippe\Yousign\Api\Model\InitiateInvoice;
use Qdequippe\Yousign\Api\Model\InitiateInvoiceChecks;
use Qdequippe\Yousign\Api\Model\InitiateNaturalPersonMonitoring;
use Qdequippe\Yousign\Api\Model\InitiatePayslip;
use Qdequippe\Yousign\Api\Model\InitiatePayslipChecks;
use Qdequippe\Yousign\Api\Model\InitiatePayslipChecksFullNameCheck;
use Qdequippe\Yousign\Api\Model\InitiateProofOfAddress;
use Qdequippe\Yousign\Api\Model\InitiateProofOfAddress1;
use Qdequippe\Yousign\Api\Model\InitiateProofOfAddress1Checks;
use Qdequippe\Yousign\Api\Model\InitiateProofOfAddressFromApplicant;
use Qdequippe\Yousign\Api\Model\InitiateProofOfAddressNaturalPerson;
use Qdequippe\Yousign\Api\Model\InitiateProofOfAddressNaturalPersonAddress;
use Qdequippe\Yousign\Api\Model\InitiateRNECertificate;
use Qdequippe\Yousign\Api\Model\InitiateSocialSecurity;
use Qdequippe\Yousign\Api\Model\InitiateSocialSecurityChecks;
use Qdequippe\Yousign\Api\Model\InitiateTaxNotice;
use Qdequippe\Yousign\Api\Model\InitiateTaxNoticeChecks;
use Qdequippe\Yousign\Api\Model\InitiateTaxNoticeChecksFullNameCheck;
use Qdequippe\Yousign\Api\Model\InitiateTaxNoticeChecksIncomeYearCheck;
use Qdequippe\Yousign\Api\Model\InitiateTemporaryVehicleRegistrationDocument;
use Qdequippe\Yousign\Api\Model\InitiateTemporaryVehicleRegistrationDocumentChecks;
use Qdequippe\Yousign\Api\Model\InitiateTemporaryVehicleRegistrationDocumentChecksVehicleOwner;
use Qdequippe\Yousign\Api\Model\InitiateVehicleRegistrationDocument;
use Qdequippe\Yousign\Api\Model\InitiateVehicleRegistrationDocumentChecks;
use Qdequippe\Yousign\Api\Model\InitiateVehicleRegistrationDocumentChecksVehicleOwner;
use Qdequippe\Yousign\Api\Model\InitiateWatchlist;
use Qdequippe\Yousign\Api\Model\InitiateWatchlistNaturalPerson;
use Qdequippe\Yousign\Api\Model\InternalServerError;
use Qdequippe\Yousign\Api\Model\InvitedSignersConsumption;
use Qdequippe\Yousign\Api\Model\InvoiceCheck;
use Qdequippe\Yousign\Api\Model\ItalianInvoiceDocument;
use Qdequippe\Yousign\Api\Model\ItalianInvoiceExtraction;
use Qdequippe\Yousign\Api\Model\ItalianProofOfAddressDocument;
use Qdequippe\Yousign\Api\Model\ItalianProofOfAddressExtraction;
use Qdequippe\Yousign\Api\Model\ItalianTaxNotice;
use Qdequippe\Yousign\Api\Model\ItalianTaxNoticeExtraction;
use Qdequippe\Yousign\Api\Model\ItalianVehicleRegistrationDocument;
use Qdequippe\Yousign\Api\Model\ItalianVehicleRegistrationDocumentExtraction;
use Qdequippe\Yousign\Api\Model\ItalianVehicleRegistrationDocumentExtractionDeedInformationsInner;
use Qdequippe\Yousign\Api\Model\ItalianVehicleRegistrationDocumentExtractionOwnerInformation;
use Qdequippe\Yousign\Api\Model\ItalianVehicleRegistrationDocumentExtractionVehicleMotorInformation;
use Qdequippe\Yousign\Api\Model\Label;
use Qdequippe\Yousign\Api\Model\LegalPerson;
use Qdequippe\Yousign\Api\Model\LegalPersonApplicant;
use Qdequippe\Yousign\Api\Model\LegalPersonBankAccount;
use Qdequippe\Yousign\Api\Model\ListElectronicSealImages200Response;
use Qdequippe\Yousign\Api\Model\MarkWorkspaceAsDefault;
use Qdequippe\Yousign\Api\Model\Mention;
use Qdequippe\Yousign\Api\Model\Mention1;
use Qdequippe\Yousign\Api\Model\Mention2;
use Qdequippe\Yousign\Api\Model\Metadata;
use Qdequippe\Yousign\Api\Model\MethodNotAllowed;
use Qdequippe\Yousign\Api\Model\MinimalLayout;
use Qdequippe\Yousign\Api\Model\NaturalPerson;
use Qdequippe\Yousign\Api\Model\NaturalPersonAddress;
use Qdequippe\Yousign\Api\Model\NaturalPersonApplicant;
use Qdequippe\Yousign\Api\Model\NaturalPersonBankAccount;
use Qdequippe\Yousign\Api\Model\NaturalPersonIdentity;
use Qdequippe\Yousign\Api\Model\NaturalPersonMonitoringFull;
use Qdequippe\Yousign\Api\Model\NewApproverFromExistingContact;
use Qdequippe\Yousign\Api\Model\NewApproverFromExistingSigner;
use Qdequippe\Yousign\Api\Model\NewApproverFromExistingUser;
use Qdequippe\Yousign\Api\Model\NewApproverFromScratch;
use Qdequippe\Yousign\Api\Model\NewApproverFromScratchInfo;
use Qdequippe\Yousign\Api\Model\NewSignatureRequestFromScratch;
use Qdequippe\Yousign\Api\Model\NewSignatureRequestFromScratchReminderSettings;
use Qdequippe\Yousign\Api\Model\NewSignatureRequestFromScratchTemplatePlaceholders;
use Qdequippe\Yousign\Api\Model\NewSignerFromExistingContact;
use Qdequippe\Yousign\Api\Model\NewSignerFromExistingUser;
use Qdequippe\Yousign\Api\Model\NewSignerFromExistingUserCustomText;
use Qdequippe\Yousign\Api\Model\NewSignerFromIdentityVerification;
use Qdequippe\Yousign\Api\Model\NewSignerFromIdentityVerificationCustomText;
use Qdequippe\Yousign\Api\Model\NewSignerFromIdentityVerificationInfo;
use Qdequippe\Yousign\Api\Model\NewSignerFromScratch;
use Qdequippe\Yousign\Api\Model\NewSignerFromScratchCustomText;
use Qdequippe\Yousign\Api\Model\NewSignerFromScratchInfo;
use Qdequippe\Yousign\Api\Model\NewSignerFromScratchRedirectUrls;
use Qdequippe\Yousign\Api\Model\NotFoundResponse;
use Qdequippe\Yousign\Api\Model\OtpMessage;
use Qdequippe\Yousign\Api\Model\Pagination;
use Qdequippe\Yousign\Api\Model\PaginationWithUpdatedAt;
use Qdequippe\Yousign\Api\Model\PatchCustomExperienceLogoRequest;
use Qdequippe\Yousign\Api\Model\PayslipCheck;
use Qdequippe\Yousign\Api\Model\PayslipExtraction;
use Qdequippe\Yousign\Api\Model\PayslipFull;
use Qdequippe\Yousign\Api\Model\PostSignatureRequestsIdPause201Response;
use Qdequippe\Yousign\Api\Model\PostSignatureRequestsIdResume201Response;
use Qdequippe\Yousign\Api\Model\PostSignatureRequestsSignatureRequestIdCancel201Response;
use Qdequippe\Yousign\Api\Model\PostSignatureRequestsSignatureRequestIdCancelRequest;
use Qdequippe\Yousign\Api\Model\PostSignatureRequestsSignatureRequestIdDocumentsDocumentIdReplaceRequest;
use Qdequippe\Yousign\Api\Model\PostSignatureRequestsSignatureRequestIdReactivateRequest;
use Qdequippe\Yousign\Api\Model\ProofOfAddressCheck;
use Qdequippe\Yousign\Api\Model\ProofOfAddressMeta;
use Qdequippe\Yousign\Api\Model\ProofOfAddressVerificationFull;
use Qdequippe\Yousign\Api\Model\ProofOfAddressVerificationFullAllOfData;
use Qdequippe\Yousign\Api\Model\ProofOfAddressVerificationFullAllOfDataExtractedFromDocument;
use Qdequippe\Yousign\Api\Model\ProofOfAddressVerificationFullAllOfDataExtractedFromDocument2dDoc;
use Qdequippe\Yousign\Api\Model\ProofOfAddressVerificationFullAllOfDataExtractedFromDocument2dDocAddress;
use Qdequippe\Yousign\Api\Model\RadioGroup;
use Qdequippe\Yousign\Api\Model\RadioGroup1;
use Qdequippe\Yousign\Api\Model\RadioGroup1RadiosInner;
use Qdequippe\Yousign\Api\Model\RadioGroup2;
use Qdequippe\Yousign\Api\Model\RadioGroup2RadiosInner;
use Qdequippe\Yousign\Api\Model\RadioGroupRadiosInner;
use Qdequippe\Yousign\Api\Model\ReadOnlyText;
use Qdequippe\Yousign\Api\Model\ReadOnlyText1;
use Qdequippe\Yousign\Api\Model\ResolveWorkflowSessionAction;
use Qdequippe\Yousign\Api\Model\ResolveWorkflowSessionActionResource;
use Qdequippe\Yousign\Api\Model\RNECertificateCheck;
use Qdequippe\Yousign\Api\Model\RNECertificateExtraction;
use Qdequippe\Yousign\Api\Model\RNECertificateFull;
use Qdequippe\Yousign\Api\Model\Signature;
use Qdequippe\Yousign\Api\Model\Signature1;
use Qdequippe\Yousign\Api\Model\Signature2;
use Qdequippe\Yousign\Api\Model\SignatureDate;
use Qdequippe\Yousign\Api\Model\SignatureDate1;
use Qdequippe\Yousign\Api\Model\SignatureDisplayOneOf;
use Qdequippe\Yousign\Api\Model\SignatureDisplayOneOf1;
use Qdequippe\Yousign\Api\Model\SignatureDisplayOneOf1Options;
use Qdequippe\Yousign\Api\Model\SignatureRequest;
use Qdequippe\Yousign\Api\Model\SignatureRequestActivated;
use Qdequippe\Yousign\Api\Model\SignatureRequestActivatedDocumentsInner;
use Qdequippe\Yousign\Api\Model\SignatureRequestDeclineInformation;
use Qdequippe\Yousign\Api\Model\SignatureRequestEmailNotification;
use Qdequippe\Yousign\Api\Model\SignatureRequestEmailNotificationCustomText;
use Qdequippe\Yousign\Api\Model\SignatureRequestEmailNotificationSender;
use Qdequippe\Yousign\Api\Model\SignatureRequestEmbeddedPreparation;
use Qdequippe\Yousign\Api\Model\SignatureRequestEmbeddedPreparationRedirectUrls;
use Qdequippe\Yousign\Api\Model\SignatureRequestInList;
use Qdequippe\Yousign\Api\Model\SignatureRequestInListApproversInner;
use Qdequippe\Yousign\Api\Model\SignatureRequestInListDocumentsInner;
use Qdequippe\Yousign\Api\Model\SignatureRequestInListReminderSettings;
use Qdequippe\Yousign\Api\Model\SignatureRequestInListSender;
use Qdequippe\Yousign\Api\Model\SignatureRequestInListSignersInner;
use Qdequippe\Yousign\Api\Model\SignatureRequestLabel;
use Qdequippe\Yousign\Api\Model\SignatureRequestPlaceholderReadOnlyTextFieldSubstituteInput;
use Qdequippe\Yousign\Api\Model\SignatureRequestPlaceholderSignerSubstituteFromContactIdInput;
use Qdequippe\Yousign\Api\Model\SignatureRequestPlaceholderSignerSubstituteFromContactIdInputCustomText;
use Qdequippe\Yousign\Api\Model\SignatureRequestPlaceholderSignerSubstituteFromContactIdInputRedirectUrls;
use Qdequippe\Yousign\Api\Model\SignatureRequestPlaceholderSignerSubstituteFromInfoInput;
use Qdequippe\Yousign\Api\Model\SignatureRequestPlaceholderSignerSubstituteFromInfoInputInfo;
use Qdequippe\Yousign\Api\Model\SignatureRequestPlaceholderSignerSubstituteFromInfoInputRedirectUrls;
use Qdequippe\Yousign\Api\Model\SignatureRequestPlaceholderSignerSubstituteFromUserIdInput;
use Qdequippe\Yousign\Api\Model\SignatureRequestRejectionInformation;
use Qdequippe\Yousign\Api\Model\SignatureRequestReminderSettings;
use Qdequippe\Yousign\Api\Model\SignatureRequestSignerFromContactIdInput;
use Qdequippe\Yousign\Api\Model\SignatureRequestSignerFromInfoInput;
use Qdequippe\Yousign\Api\Model\SignatureRequestSignerFromInfoInputCustomText;
use Qdequippe\Yousign\Api\Model\SignatureRequestSignerFromInfoInputInfo;
use Qdequippe\Yousign\Api\Model\SignatureRequestSignerFromInfoInputRedirectUrls;
use Qdequippe\Yousign\Api\Model\SignatureRequestSignerFromUserIdInput;
use Qdequippe\Yousign\Api\Model\Signer;
use Qdequippe\Yousign\Api\Model\SignerAuditTrail;
use Qdequippe\Yousign\Api\Model\SignerConsentRequest;
use Qdequippe\Yousign\Api\Model\SignerConsentRequestSettings;
use Qdequippe\Yousign\Api\Model\SignerDocument;
use Qdequippe\Yousign\Api\Model\SignerDocumentRequest;
use Qdequippe\Yousign\Api\Model\SignerEmail;
use Qdequippe\Yousign\Api\Model\SignerIdentityVerification;
use Qdequippe\Yousign\Api\Model\SignerInfo;
use Qdequippe\Yousign\Api\Model\SignerName;
use Qdequippe\Yousign\Api\Model\SignerRedirectUrls;
use Qdequippe\Yousign\Api\Model\SignerSign;
use Qdequippe\Yousign\Api\Model\SignerSignWithUploadedSignatureImage;
use Qdequippe\Yousign\Api\Model\SmsNotification;
use Qdequippe\Yousign\Api\Model\SmsNotification1;
use Qdequippe\Yousign\Api\Model\SocialSecurityCheck;
use Qdequippe\Yousign\Api\Model\SocialSecurityExtraction;
use Qdequippe\Yousign\Api\Model\SocialSecurityFull;
use Qdequippe\Yousign\Api\Model\TaxNoticeCheck;
use Qdequippe\Yousign\Api\Model\TaxNoticeCheckIncomeYear;
use Qdequippe\Yousign\Api\Model\Template;
use Qdequippe\Yousign\Api\Model\TemporaryVehicleRegistrationDocumentCheck;
use Qdequippe\Yousign\Api\Model\TemporaryVehicleRegistrationDocumentCheckVehicleOwner;
use Qdequippe\Yousign\Api\Model\TemporaryVehicleRegistrationDocumentExtraction;
use Qdequippe\Yousign\Api\Model\TemporaryVehicleRegistrationDocumentExtractionDocumentRecipientInformation;
use Qdequippe\Yousign\Api\Model\TemporaryVehicleRegistrationDocumentExtractionVehicleOwnerInformation;
use Qdequippe\Yousign\Api\Model\TemporaryVehicleRegistrationDocumentFull;
use Qdequippe\Yousign\Api\Model\Text;
use Qdequippe\Yousign\Api\Model\Text1;
use Qdequippe\Yousign\Api\Model\Text2;
use Qdequippe\Yousign\Api\Model\TooManyRequestsResponse;
use Qdequippe\Yousign\Api\Model\UnauthorizedResponse;
use Qdequippe\Yousign\Api\Model\UnsupportedMediaTypeResponse;
use Qdequippe\Yousign\Api\Model\UpdateApprover;
use Qdequippe\Yousign\Api\Model\UpdateApproverInfo;
use Qdequippe\Yousign\Api\Model\UpdateContact;
use Qdequippe\Yousign\Api\Model\UpdateCustomExperience;
use Qdequippe\Yousign\Api\Model\UpdateCustomExperienceEmbeddedPreparationNavigationBar;
use Qdequippe\Yousign\Api\Model\UpdateCustomExperienceRedirectUrls;
use Qdequippe\Yousign\Api\Model\UpdateCustomProperty;
use Qdequippe\Yousign\Api\Model\UpdateDocument;
use Qdequippe\Yousign\Api\Model\UpdateDocumentInitials;
use Qdequippe\Yousign\Api\Model\UpdateFieldFont;
use Qdequippe\Yousign\Api\Model\UpdateLabel;
use Qdequippe\Yousign\Api\Model\UpdateLegalPerson;
use Qdequippe\Yousign\Api\Model\UpdateNaturalPerson;
use Qdequippe\Yousign\Api\Model\UpdateSignatureRequest;
use Qdequippe\Yousign\Api\Model\UpdateSignatureRequestReminderSettings;
use Qdequippe\Yousign\Api\Model\UpdateSigner;
use Qdequippe\Yousign\Api\Model\UpdateSignerConsentRequest;
use Qdequippe\Yousign\Api\Model\UpdateSignerDocumentRequest;
use Qdequippe\Yousign\Api\Model\UpdateSignerInfo;
use Qdequippe\Yousign\Api\Model\UpdateUser;
use Qdequippe\Yousign\Api\Model\UpdateWebhookSubscription;
use Qdequippe\Yousign\Api\Model\UpdateWorkflowSessionApplicant;
use Qdequippe\Yousign\Api\Model\UpdateWorkspace;
use Qdequippe\Yousign\Api\Model\UploadArchivedFile;
use Qdequippe\Yousign\Api\Model\UploadElectronicSealImage;
use Qdequippe\Yousign\Api\Model\User;
use Qdequippe\Yousign\Api\Model\UserInvitation;
use Qdequippe\Yousign\Api\Model\UserWorkspacesInner;
use Qdequippe\Yousign\Api\Model\VehicleRegistrationDocumentCheck;
use Qdequippe\Yousign\Api\Model\WatchlistFull;
use Qdequippe\Yousign\Api\Model\WatchlistFullAllOfData;
use Qdequippe\Yousign\Api\Model\WatchlistFullAllOfDataPoliticallyExposedPerson;
use Qdequippe\Yousign\Api\Model\WatchlistFullAllOfDataPoliticallyExposedPersonPositions;
use Qdequippe\Yousign\Api\Model\WatchlistFullAllOfDataPoliticallyExposedPersonSources;
use Qdequippe\Yousign\Api\Model\WatchlistFullAllOfDataSanctions;
use Qdequippe\Yousign\Api\Model\WatchlistFullAllOfDataSanctionsRecords;
use Qdequippe\Yousign\Api\Model\WatchlistFullAllOfDataSanctionsSources;
use Qdequippe\Yousign\Api\Model\WatchlistMeta;
use Qdequippe\Yousign\Api\Model\WebhookSubscription;
use Qdequippe\Yousign\Api\Model\WorkflowSession;
use Qdequippe\Yousign\Api\Model\WorkflowSessionActionGroupsInner;
use Qdequippe\Yousign\Api\Model\WorkflowSessionActionGroupsInnerActionsInner;
use Qdequippe\Yousign\Api\Model\WorkflowSessionActionGroupsInnerActionsInnerPreviousAttemptsInner;
use Qdequippe\Yousign\Api\Model\WorkflowSessionActionGroupsInnerActionsInnerResolution;
use Qdequippe\Yousign\Api\Model\WorkflowSessionActionResource;
use Qdequippe\Yousign\Api\Model\WorkflowSessionApplicantListItem;
use Qdequippe\Yousign\Api\Model\WorkflowSessionLinks;
use Qdequippe\Yousign\Api\Model\WorkflowSessionLinksApplicantsInner;
use Qdequippe\Yousign\Api\Model\WorkflowTemplate;
use Qdequippe\Yousign\Api\Model\WorkflowTemplateActionGroupsInner;
use Qdequippe\Yousign\Api\Model\WorkflowTemplateWorkspacesInner;
use Qdequippe\Yousign\Api\Model\Workspace;
use Qdequippe\Yousign\Api\Model\WorkspaceUsersInner;
use Qdequippe\Yousign\Api\Runtime\Normalizer\CheckArray;
use Qdequippe\Yousign\Api\Runtime\Normalizer\ReferenceNormalizer;
use Qdequippe\Yousign\Api\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class JaneObjectNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;
    protected $normalizers = [
        UploadArchivedFile::class => UploadArchivedFileNormalizer::class,

        ArchivedFile::class => ArchivedFileNormalizer::class,

        Consumption::class => ConsumptionNormalizer::class,

        AddonConsumption::class => AddonConsumptionNormalizer::class,

        PaginationWithUpdatedAt::class => PaginationWithUpdatedAtNormalizer::class,

        DetailedConsumption::class => DetailedConsumptionNormalizer::class,

        Pagination::class => PaginationNormalizer::class,

        ElectronicSealsConsumption::class => ElectronicSealsConsumptionNormalizer::class,

        IdentificationsConsumption::class => IdentificationsConsumptionNormalizer::class,

        InvitedSignersConsumption::class => InvitedSignersConsumptionNormalizer::class,

        Contact::class => ContactNormalizer::class,

        CreateContact::class => CreateContactNormalizer::class,

        UpdateContact::class => UpdateContactNormalizer::class,

        CustomExperience::class => CustomExperienceNormalizer::class,

        CreateCustomExperience::class => CreateCustomExperienceNormalizer::class,

        CreateCustomExperienceEmbeddedPreparationNavigationBar::class => CreateCustomExperienceEmbeddedPreparationNavigationBarNormalizer::class,

        UpdateCustomExperience::class => UpdateCustomExperienceNormalizer::class,

        UpdateCustomExperienceEmbeddedPreparationNavigationBar::class => UpdateCustomExperienceEmbeddedPreparationNavigationBarNormalizer::class,

        CustomPropertyList::class => CustomPropertyListNormalizer::class,

        CreateCustomProperty::class => CreateCustomPropertyNormalizer::class,

        CustomProperty::class => CustomPropertyNormalizer::class,

        UpdateCustomProperty::class => UpdateCustomPropertyNormalizer::class,

        DocumentAnalysisMeta::class => DocumentAnalysisMetaNormalizer::class,

        InitiateDocumentAnalysisFromApplicant::class => InitiateDocumentAnalysisFromApplicantNormalizer::class,

        SocialSecurityFull::class => SocialSecurityFullNormalizer::class,

        CompanyCertificateFull::class => CompanyCertificateFullNormalizer::class,

        BusinessRegistrationCertificateFull::class => BusinessRegistrationCertificateFullNormalizer::class,

        DriverLicenceFull::class => DriverLicenceFullNormalizer::class,

        RNECertificateFull::class => RNECertificateFullNormalizer::class,

        TemporaryVehicleRegistrationDocumentFull::class => TemporaryVehicleRegistrationDocumentFullNormalizer::class,

        AutoInsuranceClaimsHistoryFull::class => AutoInsuranceClaimsHistoryFullNormalizer::class,

        PayslipFull::class => PayslipFullNormalizer::class,

        IdDocumentFull::class => IdDocumentFullNormalizer::class,

        FraudOnlyFull::class => FraudOnlyFullNormalizer::class,

        CreateDocumentFromMultipart::class => CreateDocumentFromMultipartNormalizer::class,

        CreateDocumentFromMultipartInitials::class => CreateDocumentFromMultipartInitialsNormalizer::class,

        Document::class => DocumentNormalizer::class,

        CreateElectronicSealDocument::class => CreateElectronicSealDocumentNormalizer::class,

        ElectronicSealDocument::class => ElectronicSealDocumentNormalizer::class,

        ElectronicSealImage::class => ElectronicSealImageNormalizer::class,

        UploadElectronicSealImage::class => UploadElectronicSealImageNormalizer::class,

        CreateElectronicSealImagePreviewPayload::class => CreateElectronicSealImagePreviewPayloadNormalizer::class,

        CreateElectronicSealPayload::class => CreateElectronicSealPayloadNormalizer::class,

        ElectronicSeal::class => ElectronicSealNormalizer::class,

        ElectronicSealAuditTrail::class => ElectronicSealAuditTrailNormalizer::class,

        Label::class => LabelNormalizer::class,

        CreateLabel::class => CreateLabelNormalizer::class,

        UpdateLabel::class => UpdateLabelNormalizer::class,

        NaturalPersonMonitoringFull::class => NaturalPersonMonitoringFullNormalizer::class,

        InitiateNaturalPersonMonitoring::class => InitiateNaturalPersonMonitoringNormalizer::class,

        SignatureRequestInList::class => SignatureRequestInListNormalizer::class,

        SignatureRequest::class => SignatureRequestNormalizer::class,

        UpdateSignatureRequest::class => UpdateSignatureRequestNormalizer::class,

        ActivateSignatureRequest::class => ActivateSignatureRequestNormalizer::class,

        SignatureRequestActivated::class => SignatureRequestActivatedNormalizer::class,

        Approver::class => ApproverNormalizer::class,

        CreateApprover::class => CreateApproverNormalizer::class,

        UpdateApprover::class => UpdateApproverNormalizer::class,

        SignerConsentRequest::class => SignerConsentRequestNormalizer::class,

        CreateSignerConsentRequest::class => CreateSignerConsentRequestNormalizer::class,

        UpdateSignerConsentRequest::class => UpdateSignerConsentRequestNormalizer::class,

        SignerDocumentRequest::class => SignerDocumentRequestNormalizer::class,

        CreateSignerDocumentRequest::class => CreateSignerDocumentRequestNormalizer::class,

        UpdateSignerDocumentRequest::class => UpdateSignerDocumentRequestNormalizer::class,

        CreateDocumentFromJson::class => CreateDocumentFromJsonNormalizer::class,

        UpdateDocument::class => UpdateDocumentNormalizer::class,

        UpdateDocumentInitials::class => UpdateDocumentInitialsNormalizer::class,

        FieldSignature::class => FieldSignatureNormalizer::class,

        FieldText::class => FieldTextNormalizer::class,

        FieldMention::class => FieldMentionNormalizer::class,

        FieldCheckbox::class => FieldCheckboxNormalizer::class,

        FieldRadioButtonGroup::class => FieldRadioButtonGroupNormalizer::class,

        FieldReadOnlyText::class => FieldReadOnlyTextNormalizer::class,

        FieldSignatureDate::class => FieldSignatureDateNormalizer::class,

        FieldSignerName::class => FieldSignerNameNormalizer::class,

        FieldSignerEmail::class => FieldSignerEmailNormalizer::class,

        FieldAnswer::class => FieldAnswerNormalizer::class,

        EmbeddedPreparationLink::class => EmbeddedPreparationLinkNormalizer::class,

        Follower::class => FollowerNormalizer::class,

        SignatureRequestLabel::class => SignatureRequestLabelNormalizer::class,

        Metadata::class => MetadataNormalizer::class,

        Signer::class => SignerNormalizer::class,

        UpdateSigner::class => UpdateSignerNormalizer::class,

        SignerAuditTrail::class => SignerAuditTrailNormalizer::class,

        SignerDocument::class => SignerDocumentNormalizer::class,

        SignerIdentityVerification::class => SignerIdentityVerificationNormalizer::class,

        SignerSign::class => SignerSignNormalizer::class,

        SignerSignWithUploadedSignatureImage::class => SignerSignWithUploadedSignatureImageNormalizer::class,

        Template::class => TemplateNormalizer::class,

        User::class => UserNormalizer::class,

        CreateUser::class => CreateUserNormalizer::class,

        UserInvitation::class => UserInvitationNormalizer::class,

        UpdateUser::class => UpdateUserNormalizer::class,

        BankAccountLookupMeta::class => BankAccountLookupMetaNormalizer::class,

        InitiateBankAccountLookupWithNaturalPerson::class => InitiateBankAccountLookupWithNaturalPersonNormalizer::class,

        InitiateBankAccountLookupWithLegalPerson::class => InitiateBankAccountLookupWithLegalPersonNormalizer::class,

        InitiateBankAccountLookupFromApplicant::class => InitiateBankAccountLookupFromApplicantNormalizer::class,

        InitiateBankAccountLookupWithNaturalPersonFromFile::class => InitiateBankAccountLookupWithNaturalPersonFromFileNormalizer::class,

        InitiateBankAccountLookupWithLegalPersonFromFile::class => InitiateBankAccountLookupWithLegalPersonFromFileNormalizer::class,

        BankAccountLookupFull::class => BankAccountLookupFullNormalizer::class,

        BankAccountMeta::class => BankAccountMetaNormalizer::class,

        InitiateBankAccountFromApplicant::class => InitiateBankAccountFromApplicantNormalizer::class,

        InitiateBankAccount::class => InitiateBankAccountNormalizer::class,

        InitiateBankAccountWithLegalPerson::class => InitiateBankAccountWithLegalPersonNormalizer::class,

        InitiateBankAccountWithNaturalPerson::class => InitiateBankAccountWithNaturalPersonNormalizer::class,

        BankAccountFull::class => BankAccountFullNormalizer::class,

        CompanyMeta::class => CompanyMetaNormalizer::class,

        InitiateCompanyFromJson::class => InitiateCompanyFromJsonNormalizer::class,

        InitiateCompanyFromApplicant::class => InitiateCompanyFromApplicantNormalizer::class,

        InitiateCompanyFromFile::class => InitiateCompanyFromFileNormalizer::class,

        CompanyFull::class => CompanyFullNormalizer::class,

        IdentityDocumentMeta::class => IdentityDocumentMetaNormalizer::class,

        InitiateIdentityDocumentFromApplicant::class => InitiateIdentityDocumentFromApplicantNormalizer::class,

        InitiateIdentityDocument::class => InitiateIdentityDocumentNormalizer::class,

        InitiateIdentityDocumentWithoutName::class => InitiateIdentityDocumentWithoutNameNormalizer::class,

        IdentityDocumentFull::class => IdentityDocumentFullNormalizer::class,

        IdentityVideoMeta::class => IdentityVideoMetaNormalizer::class,

        InitiateIdentityVideo::class => InitiateIdentityVideoNormalizer::class,

        IdentityVideoFull::class => IdentityVideoFullNormalizer::class,

        ProofOfAddressMeta::class => ProofOfAddressMetaNormalizer::class,

        InitiateProofOfAddressFromApplicant::class => InitiateProofOfAddressFromApplicantNormalizer::class,

        InitiateProofOfAddress::class => InitiateProofOfAddressNormalizer::class,

        ProofOfAddressVerificationFull::class => ProofOfAddressVerificationFullNormalizer::class,

        WatchlistMeta::class => WatchlistMetaNormalizer::class,

        InitiateWatchlist::class => InitiateWatchlistNormalizer::class,

        WatchlistFull::class => WatchlistFullNormalizer::class,

        WebhookSubscription::class => WebhookSubscriptionNormalizer::class,

        CreateWebhookSubscription::class => CreateWebhookSubscriptionNormalizer::class,

        UpdateWebhookSubscription::class => UpdateWebhookSubscriptionNormalizer::class,

        WorkflowSession::class => WorkflowSessionNormalizer::class,

        CreateWorkflowSession::class => CreateWorkflowSessionNormalizer::class,

        WorkflowSessionApplicantListItem::class => WorkflowSessionApplicantListItemNormalizer::class,

        UpdateWorkflowSessionApplicant::class => UpdateWorkflowSessionApplicantNormalizer::class,

        WorkflowSessionLinks::class => WorkflowSessionLinksNormalizer::class,

        ResolveWorkflowSessionAction::class => ResolveWorkflowSessionActionNormalizer::class,

        WorkflowTemplate::class => WorkflowTemplateNormalizer::class,

        Workspace::class => WorkspaceNormalizer::class,

        CreateWorkspace::class => CreateWorkspaceNormalizer::class,

        MarkWorkspaceAsDefault::class => MarkWorkspaceAsDefaultNormalizer::class,

        DeleteWorkspace::class => DeleteWorkspaceNormalizer::class,

        UpdateWorkspace::class => UpdateWorkspaceNormalizer::class,

        CustomExperienceEmbeddedPreparationNavigationBar::class => CustomExperienceEmbeddedPreparationNavigationBarNormalizer::class,

        CustomPropertyOptionInput::class => CustomPropertyOptionInputNormalizer::class,

        CustomPropertyOption::class => CustomPropertyOptionNormalizer::class,

        CustomPropertyOptionUpdate::class => CustomPropertyOptionUpdateNormalizer::class,

        AnalysisType::class => AnalysisTypeNormalizer::class,

        FraudRiskAnalysis::class => FraudRiskAnalysisNormalizer::class,

        DocumentClassification::class => DocumentClassificationNormalizer::class,

        InitiateSocialSecurity::class => InitiateSocialSecurityNormalizer::class,

        InitiateCompanyCertificate::class => InitiateCompanyCertificateNormalizer::class,

        InitiateBusinessRegistrationCertificate::class => InitiateBusinessRegistrationCertificateNormalizer::class,

        InitiateDriverLicence::class => InitiateDriverLicenceNormalizer::class,

        InitiateRNECertificate::class => InitiateRNECertificateNormalizer::class,

        InitiateTemporaryVehicleRegistrationDocument::class => InitiateTemporaryVehicleRegistrationDocumentNormalizer::class,

        InitiateVehicleRegistrationDocument::class => InitiateVehicleRegistrationDocumentNormalizer::class,

        InitiateAutoInsuranceClaimsHistory::class => InitiateAutoInsuranceClaimsHistoryNormalizer::class,

        InitiateTaxNotice::class => InitiateTaxNoticeNormalizer::class,

        InitiatePayslip::class => InitiatePayslipNormalizer::class,

        InitiateInvoice::class => InitiateInvoiceNormalizer::class,

        InitiateProofOfAddress1::class => InitiateProofOfAddress1Normalizer::class,

        InitiateIdDocument::class => InitiateIdDocumentNormalizer::class,

        InitiateFraudOnly::class => InitiateFraudOnlyNormalizer::class,

        DocumentAnalysisMeta1::class => DocumentAnalysisMeta1Normalizer::class,

        SocialSecurityExtraction::class => SocialSecurityExtractionNormalizer::class,

        SocialSecurityCheck::class => SocialSecurityCheckNormalizer::class,

        CompanyCertificateExtraction::class => CompanyCertificateExtractionNormalizer::class,

        CompanyCertificateCheck::class => CompanyCertificateCheckNormalizer::class,

        BusinessRegistrationCertificateExtraction::class => BusinessRegistrationCertificateExtractionNormalizer::class,

        BusinessRegistrationCertificateCheck::class => BusinessRegistrationCertificateCheckNormalizer::class,

        DriverLicenceExtraction::class => DriverLicenceExtractionNormalizer::class,

        DriverLicenceCheck::class => DriverLicenceCheckNormalizer::class,

        RNECertificateExtraction::class => RNECertificateExtractionNormalizer::class,

        RNECertificateCheck::class => RNECertificateCheckNormalizer::class,

        TemporaryVehicleRegistrationDocumentExtraction::class => TemporaryVehicleRegistrationDocumentExtractionNormalizer::class,

        TemporaryVehicleRegistrationDocumentCheck::class => TemporaryVehicleRegistrationDocumentCheckNormalizer::class,

        FrenchVehicleRegistrationDocumentExtraction::class => FrenchVehicleRegistrationDocumentExtractionNormalizer::class,

        VehicleRegistrationDocumentCheck::class => VehicleRegistrationDocumentCheckNormalizer::class,

        ItalianVehicleRegistrationDocumentExtraction::class => ItalianVehicleRegistrationDocumentExtractionNormalizer::class,

        AutoInsuranceClaimsHistoryExtraction::class => AutoInsuranceClaimsHistoryExtractionNormalizer::class,

        AutoInsuranceClaimsHistoryCheck::class => AutoInsuranceClaimsHistoryCheckNormalizer::class,

        FrenchTaxNoticeExtraction::class => FrenchTaxNoticeExtractionNormalizer::class,

        TaxNoticeCheck::class => TaxNoticeCheckNormalizer::class,

        GermanTaxNoticeExtraction::class => GermanTaxNoticeExtractionNormalizer::class,

        ItalianTaxNoticeExtraction::class => ItalianTaxNoticeExtractionNormalizer::class,

        PayslipExtraction::class => PayslipExtractionNormalizer::class,

        PayslipCheck::class => PayslipCheckNormalizer::class,

        FrenchInvoiceExtraction::class => FrenchInvoiceExtractionNormalizer::class,

        InvoiceCheck::class => InvoiceCheckNormalizer::class,

        ItalianInvoiceExtraction::class => ItalianInvoiceExtractionNormalizer::class,

        GermanInvoiceExtraction::class => GermanInvoiceExtractionNormalizer::class,

        ItalianProofOfAddressExtraction::class => ItalianProofOfAddressExtractionNormalizer::class,

        ProofOfAddressCheck::class => ProofOfAddressCheckNormalizer::class,

        GermanProofOfAddressExtraction::class => GermanProofOfAddressExtractionNormalizer::class,

        IdDocumentExtraction::class => IdDocumentExtractionNormalizer::class,

        InitialsArea::class => InitialsAreaNormalizer::class,

        CreateElectronicSealFieldSealPayload::class => CreateElectronicSealFieldSealPayloadNormalizer::class,

        CreateElectronicSealFieldReadOnlyTextPayload::class => CreateElectronicSealFieldReadOnlyTextPayloadNormalizer::class,

        CustomPropertyInList::class => CustomPropertyInListNormalizer::class,

        SignatureRequestSignerFromInfoInput::class => SignatureRequestSignerFromInfoInputNormalizer::class,

        SignatureRequestSignerFromUserIdInput::class => SignatureRequestSignerFromUserIdInputNormalizer::class,

        SignatureRequestSignerFromContactIdInput::class => SignatureRequestSignerFromContactIdInputNormalizer::class,

        SignatureRequestEmailNotification::class => SignatureRequestEmailNotificationNormalizer::class,

        SignatureRequestEmbeddedPreparation::class => SignatureRequestEmbeddedPreparationNormalizer::class,

        SignatureRequestPlaceholderSignerSubstituteFromInfoInput::class => SignatureRequestPlaceholderSignerSubstituteFromInfoInputNormalizer::class,

        SignatureRequestPlaceholderSignerSubstituteFromUserIdInput::class => SignatureRequestPlaceholderSignerSubstituteFromUserIdInputNormalizer::class,

        SignatureRequestPlaceholderSignerSubstituteFromContactIdInput::class => SignatureRequestPlaceholderSignerSubstituteFromContactIdInputNormalizer::class,

        SignatureRequestPlaceholderReadOnlyTextFieldSubstituteInput::class => SignatureRequestPlaceholderReadOnlyTextFieldSubstituteInputNormalizer::class,

        CustomPropertyValue::class => CustomPropertyValueNormalizer::class,

        EmbeddedSignerWithSignatureLink::class => EmbeddedSignerWithSignatureLinkNormalizer::class,

        ApproverToNotify::class => ApproverToNotifyNormalizer::class,

        CustomText::class => CustomTextNormalizer::class,

        Font::class => FontNormalizer::class,

        CreateFieldFont::class => CreateFieldFontNormalizer::class,

        CreateSignatureDateFieldFont::class => CreateSignatureDateFieldFontNormalizer::class,

        UpdateFieldFont::class => UpdateFieldFontNormalizer::class,

        SmsNotification::class => SmsNotificationNormalizer::class,

        EmailNotification::class => EmailNotificationNormalizer::class,

        SmsNotification1::class => SmsNotification1Normalizer::class,

        EmailNotification1::class => EmailNotification1Normalizer::class,

        IdentityVideoDocument::class => IdentityVideoDocumentNormalizer::class,

        WorkflowSessionActionResource::class => WorkflowSessionActionResourceNormalizer::class,

        CreateWorkflowSessionApplicantNaturalPerson::class => CreateWorkflowSessionApplicantNaturalPersonNormalizer::class,

        CreateWorkflowSessionApplicantLegalPerson::class => CreateWorkflowSessionApplicantLegalPersonNormalizer::class,

        NaturalPerson::class => NaturalPersonNormalizer::class,

        NaturalPersonIdentity::class => NaturalPersonIdentityNormalizer::class,

        NaturalPersonAddress::class => NaturalPersonAddressNormalizer::class,

        NaturalPersonBankAccount::class => NaturalPersonBankAccountNormalizer::class,

        LegalPerson::class => LegalPersonNormalizer::class,

        LegalPersonBankAccount::class => LegalPersonBankAccountNormalizer::class,

        UpdateNaturalPerson::class => UpdateNaturalPersonNormalizer::class,

        UpdateLegalPerson::class => UpdateLegalPersonNormalizer::class,

        AnalysisTypeMultipart::class => AnalysisTypeMultipartNormalizer::class,

        DocumentAnalysisCheck::class => DocumentAnalysisCheckNormalizer::class,

        SignatureRequestEmailNotificationSender::class => SignatureRequestEmailNotificationSenderNormalizer::class,

        FontVariants::class => FontVariantsNormalizer::class,

        OtpMessage::class => OtpMessageNormalizer::class,

        CreateNaturalPerson::class => CreateNaturalPersonNormalizer::class,

        CreateLegalPerson::class => CreateLegalPersonNormalizer::class,

        Identity::class => IdentityNormalizer::class,

        Address::class => AddressNormalizer::class,

        BankAccount::class => BankAccountNormalizer::class,

        BadRequestResponse::class => BadRequestResponseNormalizer::class,

        UnauthorizedResponse::class => UnauthorizedResponseNormalizer::class,

        ForbiddenResponse::class => ForbiddenResponseNormalizer::class,

        NotFoundResponse::class => NotFoundResponseNormalizer::class,

        MethodNotAllowed::class => MethodNotAllowedNormalizer::class,

        UnsupportedMediaTypeResponse::class => UnsupportedMediaTypeResponseNormalizer::class,

        TooManyRequestsResponse::class => TooManyRequestsResponseNormalizer::class,

        InternalServerError::class => InternalServerErrorNormalizer::class,

        GetConsumptionAddon200Response::class => GetConsumptionAddon200ResponseNormalizer::class,

        GetConsumptionDetail200Response::class => GetConsumptionDetail200ResponseNormalizer::class,

        GetConsumptionsRecordsElectronicSeals200Response::class => GetConsumptionsRecordsElectronicSeals200ResponseNormalizer::class,

        GetConsumptionsRecordsIdentifications200Response::class => GetConsumptionsRecordsIdentifications200ResponseNormalizer::class,

        GetConsumptionsRecordsInvitedSigners200Response::class => GetConsumptionsRecordsInvitedSigners200ResponseNormalizer::class,

        GetContacts200Response::class => GetContacts200ResponseNormalizer::class,

        GetCustomExperiences200Response::class => GetCustomExperiences200ResponseNormalizer::class,

        PatchCustomExperienceLogoRequest::class => PatchCustomExperienceLogoRequestNormalizer::class,

        GetDocumentAnalyses200Response::class => GetDocumentAnalyses200ResponseNormalizer::class,

        ListElectronicSealImages200Response::class => ListElectronicSealImages200ResponseNormalizer::class,

        GetLabels200Response::class => GetLabels200ResponseNormalizer::class,

        GetMonitoringsNaturalPersons200Response::class => GetMonitoringsNaturalPersons200ResponseNormalizer::class,

        GetSignatureRequests200Response::class => GetSignatureRequests200ResponseNormalizer::class,

        GetSignatureRequests200ResponseMeta::class => GetSignatureRequests200ResponseMetaNormalizer::class,

        PostSignatureRequestsSignatureRequestIdCancelRequest::class => PostSignatureRequestsSignatureRequestIdCancelRequestNormalizer::class,

        PostSignatureRequestsSignatureRequestIdCancel201Response::class => PostSignatureRequestsSignatureRequestIdCancel201ResponseNormalizer::class,

        GetSignatureRequestsSignatureRequestIdSignerConsentRequests200Response::class => GetSignatureRequestsSignatureRequestIdSignerConsentRequests200ResponseNormalizer::class,

        GetSignatureRequestsSignatureRequestIdSignerDocumentRequests200Response::class => GetSignatureRequestsSignatureRequestIdSignerDocumentRequests200ResponseNormalizer::class,

        GetSignatureRequestsSignatureRequestIdDocumentsDocumentIdFields200Response::class => GetSignatureRequestsSignatureRequestIdDocumentsDocumentIdFields200ResponseNormalizer::class,

        PostSignatureRequestsSignatureRequestIdDocumentsDocumentIdReplaceRequest::class => PostSignatureRequestsSignatureRequestIdDocumentsDocumentIdReplaceRequestNormalizer::class,

        GetSignatureRequestsSignatureRequestIdFollowers200Response::class => GetSignatureRequestsSignatureRequestIdFollowers200ResponseNormalizer::class,

        GetSignatureRequestsIdLabels200Response::class => GetSignatureRequestsIdLabels200ResponseNormalizer::class,

        GetSignatureRequestsIdLabels200ResponseMeta::class => GetSignatureRequestsIdLabels200ResponseMetaNormalizer::class,

        PostSignatureRequestsIdPause201Response::class => PostSignatureRequestsIdPause201ResponseNormalizer::class,

        PostSignatureRequestsSignatureRequestIdReactivateRequest::class => PostSignatureRequestsSignatureRequestIdReactivateRequestNormalizer::class,

        PostSignatureRequestsIdResume201Response::class => PostSignatureRequestsIdResume201ResponseNormalizer::class,

        GetSignatureRequestsSignatureRequestIdSignersSignerIdDocuments200Response::class => GetSignatureRequestsSignatureRequestIdSignersSignerIdDocuments200ResponseNormalizer::class,

        GetTemplates200Response::class => GetTemplates200ResponseNormalizer::class,

        GetUsers200Response::class => GetUsers200ResponseNormalizer::class,

        GetInvitations200Response::class => GetInvitations200ResponseNormalizer::class,

        GetVerificationsBankAccountLookups200Response::class => GetVerificationsBankAccountLookups200ResponseNormalizer::class,

        GetVerificationsBankAccounts200Response::class => GetVerificationsBankAccounts200ResponseNormalizer::class,

        GetVerificationsCompanies200Response::class => GetVerificationsCompanies200ResponseNormalizer::class,

        GetVerificationsIdentityDocuments200Response::class => GetVerificationsIdentityDocuments200ResponseNormalizer::class,

        GetVerificationsIdentityVideos200Response::class => GetVerificationsIdentityVideos200ResponseNormalizer::class,

        GetVerificationsProofsOfAddress200Response::class => GetVerificationsProofsOfAddress200ResponseNormalizer::class,

        GetVerificationsWatchlists200Response::class => GetVerificationsWatchlists200ResponseNormalizer::class,

        GetWorkflowSessions200Response::class => GetWorkflowSessions200ResponseNormalizer::class,

        GetWorkflowSessionsIdApplicants200Response::class => GetWorkflowSessionsIdApplicants200ResponseNormalizer::class,

        GetWorkflowTemplates200Response::class => GetWorkflowTemplates200ResponseNormalizer::class,

        GetWorkspaces200Response::class => GetWorkspaces200ResponseNormalizer::class,

        ConsumptionAppQualifiedElectronicSignatureIdentificationModeIdentityVerification::class => ConsumptionAppQualifiedElectronicSignatureIdentificationModeIdentityVerificationNormalizer::class,

        ConsumptionAppQualifiedElectronicSignatureIdentificationMode::class => ConsumptionAppQualifiedElectronicSignatureIdentificationModeNormalizer::class,

        ConsumptionApp::class => ConsumptionAppNormalizer::class,

        ConsumptionApi::class => ConsumptionApiNormalizer::class,

        CustomExperienceRedirectUrls::class => CustomExperienceRedirectUrlsNormalizer::class,

        CreateCustomExperienceRedirectUrls::class => CreateCustomExperienceRedirectUrlsNormalizer::class,

        UpdateCustomExperienceRedirectUrls::class => UpdateCustomExperienceRedirectUrlsNormalizer::class,

        InitiateDocumentAnalysisFromApplicantChecksIncomeYearCheck::class => InitiateDocumentAnalysisFromApplicantChecksIncomeYearCheckNormalizer::class,

        InitiateDocumentAnalysisFromApplicantChecks::class => InitiateDocumentAnalysisFromApplicantChecksNormalizer::class,

        FrenchVehicleRegistrationDocument::class => FrenchVehicleRegistrationDocumentNormalizer::class,

        ItalianVehicleRegistrationDocument::class => ItalianVehicleRegistrationDocumentNormalizer::class,

        FrenchTaxNoticeDocument::class => FrenchTaxNoticeDocumentNormalizer::class,

        GermanTaxNoticeDocument::class => GermanTaxNoticeDocumentNormalizer::class,

        ItalianTaxNotice::class => ItalianTaxNoticeNormalizer::class,

        FrenchInvoiceDocument::class => FrenchInvoiceDocumentNormalizer::class,

        ItalianInvoiceDocument::class => ItalianInvoiceDocumentNormalizer::class,

        GermanInvoiceDocument::class => GermanInvoiceDocumentNormalizer::class,

        ItalianProofOfAddressDocument::class => ItalianProofOfAddressDocumentNormalizer::class,

        GermanProofOfAddressDocument::class => GermanProofOfAddressDocumentNormalizer::class,

        FraudOnlyFullAllOfAnalysisType::class => FraudOnlyFullAllOfAnalysisTypeNormalizer::class,

        DocumentInitialsPerPageInner::class => DocumentInitialsPerPageInnerNormalizer::class,

        DocumentInitials::class => DocumentInitialsNormalizer::class,

        FromElectronicSealDocument::class => FromElectronicSealDocumentNormalizer::class,

        FromSignatureRequestDocument::class => FromSignatureRequestDocumentNormalizer::class,

        CreateElectronicSealImagePreviewPayloadFieldCaptionsInner::class => CreateElectronicSealImagePreviewPayloadFieldCaptionsInnerNormalizer::class,

        CreateElectronicSealImagePreviewPayloadField::class => CreateElectronicSealImagePreviewPayloadFieldNormalizer::class,

        SignatureRequestInListReminderSettings::class => SignatureRequestInListReminderSettingsNormalizer::class,

        SignatureRequestInListSignersInner::class => SignatureRequestInListSignersInnerNormalizer::class,

        SignatureRequestInListApproversInner::class => SignatureRequestInListApproversInnerNormalizer::class,

        SignatureRequestInListDocumentsInner::class => SignatureRequestInListDocumentsInnerNormalizer::class,

        SignatureRequestInListSender::class => SignatureRequestInListSenderNormalizer::class,

        NewSignatureRequestFromScratchReminderSettings::class => NewSignatureRequestFromScratchReminderSettingsNormalizer::class,

        NewSignatureRequestFromScratchTemplatePlaceholders::class => NewSignatureRequestFromScratchTemplatePlaceholdersNormalizer::class,

        NewSignatureRequestFromScratch::class => NewSignatureRequestFromScratchNormalizer::class,

        DuplicateASignatureRequest::class => DuplicateASignatureRequestNormalizer::class,

        SignatureRequestReminderSettings::class => SignatureRequestReminderSettingsNormalizer::class,

        SignatureRequestEmbeddedPreparationRedirectUrls::class => SignatureRequestEmbeddedPreparationRedirectUrlsNormalizer::class,

        SignatureRequestDeclineInformation::class => SignatureRequestDeclineInformationNormalizer::class,

        SignatureRequestRejectionInformation::class => SignatureRequestRejectionInformationNormalizer::class,

        UpdateSignatureRequestReminderSettings::class => UpdateSignatureRequestReminderSettingsNormalizer::class,

        SignatureRequestActivatedDocumentsInner::class => SignatureRequestActivatedDocumentsInnerNormalizer::class,

        ApproverInfo::class => ApproverInfoNormalizer::class,

        NewApproverFromScratchInfo::class => NewApproverFromScratchInfoNormalizer::class,

        NewApproverFromScratch::class => NewApproverFromScratchNormalizer::class,

        NewApproverFromExistingUser::class => NewApproverFromExistingUserNormalizer::class,

        NewApproverFromExistingContact::class => NewApproverFromExistingContactNormalizer::class,

        NewApproverFromExistingSigner::class => NewApproverFromExistingSignerNormalizer::class,

        UpdateApproverInfo::class => UpdateApproverInfoNormalizer::class,

        SignerConsentRequestSettings::class => SignerConsentRequestSettingsNormalizer::class,

        CreateSignerConsentRequestSettings::class => CreateSignerConsentRequestSettingsNormalizer::class,

        FieldRadioButtonGroupRadiosInner::class => FieldRadioButtonGroupRadiosInnerNormalizer::class,

        Signature::class => SignatureNormalizer::class,

        Mention::class => MentionNormalizer::class,

        SignatureDate::class => SignatureDateNormalizer::class,

        Text::class => TextNormalizer::class,

        Checkbox::class => CheckboxNormalizer::class,

        RadioGroupRadiosInner::class => RadioGroupRadiosInnerNormalizer::class,

        RadioGroup::class => RadioGroupNormalizer::class,

        ReadOnlyText::class => ReadOnlyTextNormalizer::class,

        SignerName::class => SignerNameNormalizer::class,

        SignerEmail::class => SignerEmailNormalizer::class,

        Signature1::class => Signature1Normalizer::class,

        Mention1::class => Mention1Normalizer::class,

        SignatureDate1::class => SignatureDate1Normalizer::class,

        Text1::class => Text1Normalizer::class,

        Checkbox1::class => Checkbox1Normalizer::class,

        RadioGroup1RadiosInner::class => RadioGroup1RadiosInnerNormalizer::class,

        RadioGroup1::class => RadioGroup1Normalizer::class,

        ReadOnlyText1::class => ReadOnlyText1Normalizer::class,

        CreateFollowersInner::class => CreateFollowersInnerNormalizer::class,

        SignerInfo::class => SignerInfoNormalizer::class,

        SignerRedirectUrls::class => SignerRedirectUrlsNormalizer::class,

        NewSignerFromScratchInfo::class => NewSignerFromScratchInfoNormalizer::class,

        NewSignerFromScratchRedirectUrls::class => NewSignerFromScratchRedirectUrlsNormalizer::class,

        NewSignerFromScratchCustomText::class => NewSignerFromScratchCustomTextNormalizer::class,

        NewSignerFromScratch::class => NewSignerFromScratchNormalizer::class,

        NewSignerFromExistingUserCustomText::class => NewSignerFromExistingUserCustomTextNormalizer::class,

        NewSignerFromExistingUser::class => NewSignerFromExistingUserNormalizer::class,

        NewSignerFromExistingContact::class => NewSignerFromExistingContactNormalizer::class,

        NewSignerFromIdentityVerificationInfo::class => NewSignerFromIdentityVerificationInfoNormalizer::class,

        NewSignerFromIdentityVerificationCustomText::class => NewSignerFromIdentityVerificationCustomTextNormalizer::class,

        NewSignerFromIdentityVerification::class => NewSignerFromIdentityVerificationNormalizer::class,

        UpdateSignerInfo::class => UpdateSignerInfoNormalizer::class,

        UserWorkspacesInner::class => UserWorkspacesInnerNormalizer::class,

        InitiateBankAccountLookupWithNaturalPersonNaturalPerson::class => InitiateBankAccountLookupWithNaturalPersonNaturalPersonNormalizer::class,

        InitiateBankAccountLookupWithLegalPersonLegalPerson::class => InitiateBankAccountLookupWithLegalPersonLegalPersonNormalizer::class,

        BankAccountLookupFullDataExtractedFromDocument::class => BankAccountLookupFullDataExtractedFromDocumentNormalizer::class,

        BankAccountLookupFullData::class => BankAccountLookupFullDataNormalizer::class,

        InitiateBankAccountWithLegalPersonLegalPerson::class => InitiateBankAccountWithLegalPersonLegalPersonNormalizer::class,

        InitiateBankAccountWithNaturalPersonNaturalPerson::class => InitiateBankAccountWithNaturalPersonNaturalPersonNormalizer::class,

        BankAccountFullAllOfDataExtractedFromDocument::class => BankAccountFullAllOfDataExtractedFromDocumentNormalizer::class,

        BankAccountFullAllOfData::class => BankAccountFullAllOfDataNormalizer::class,

        CompanyFullAllOfDataExtractedFromDocument::class => CompanyFullAllOfDataExtractedFromDocumentNormalizer::class,

        CompanyFullAllOfDataCompanyInformationLegalForm::class => CompanyFullAllOfDataCompanyInformationLegalFormNormalizer::class,

        CompanyFullAllOfDataCompanyInformationActivities::class => CompanyFullAllOfDataCompanyInformationActivitiesNormalizer::class,

        CompanyFullAllOfDataCompanyInformationCommercialRegistration::class => CompanyFullAllOfDataCompanyInformationCommercialRegistrationNormalizer::class,

        CompanyFullAllOfDataCompanyInformation::class => CompanyFullAllOfDataCompanyInformationNormalizer::class,

        CompanyFullAllOfDataHeadquarter::class => CompanyFullAllOfDataHeadquarterNormalizer::class,

        CompanyFullAllOfDataLegalRepresentatives::class => CompanyFullAllOfDataLegalRepresentativesNormalizer::class,

        CompanyFullAllOfDataBeneficialOwners::class => CompanyFullAllOfDataBeneficialOwnersNormalizer::class,

        CompanyFullAllOfData::class => CompanyFullAllOfDataNormalizer::class,

        IdentityDocumentFullAllOfDataExtractedFromDocumentMrz::class => IdentityDocumentFullAllOfDataExtractedFromDocumentMrzNormalizer::class,

        IdentityDocumentFullAllOfDataExtractedFromDocument::class => IdentityDocumentFullAllOfDataExtractedFromDocumentNormalizer::class,

        IdentityDocumentFullAllOfData::class => IdentityDocumentFullAllOfDataNormalizer::class,

        IdentityVideoFullAllOfDataEvidence::class => IdentityVideoFullAllOfDataEvidenceNormalizer::class,

        IdentityVideoFullAllOfData::class => IdentityVideoFullAllOfDataNormalizer::class,

        InitiateProofOfAddressNaturalPersonAddress::class => InitiateProofOfAddressNaturalPersonAddressNormalizer::class,

        InitiateProofOfAddressNaturalPerson::class => InitiateProofOfAddressNaturalPersonNormalizer::class,

        ProofOfAddressVerificationFullAllOfDataExtractedFromDocument2dDocAddress::class => ProofOfAddressVerificationFullAllOfDataExtractedFromDocument2dDocAddressNormalizer::class,

        ProofOfAddressVerificationFullAllOfDataExtractedFromDocument2dDoc::class => ProofOfAddressVerificationFullAllOfDataExtractedFromDocument2dDocNormalizer::class,

        ProofOfAddressVerificationFullAllOfDataExtractedFromDocument::class => ProofOfAddressVerificationFullAllOfDataExtractedFromDocumentNormalizer::class,

        ProofOfAddressVerificationFullAllOfData::class => ProofOfAddressVerificationFullAllOfDataNormalizer::class,

        InitiateWatchlistNaturalPerson::class => InitiateWatchlistNaturalPersonNormalizer::class,

        WatchlistFullAllOfDataPoliticallyExposedPersonSources::class => WatchlistFullAllOfDataPoliticallyExposedPersonSourcesNormalizer::class,

        WatchlistFullAllOfDataPoliticallyExposedPersonPositions::class => WatchlistFullAllOfDataPoliticallyExposedPersonPositionsNormalizer::class,

        WatchlistFullAllOfDataPoliticallyExposedPerson::class => WatchlistFullAllOfDataPoliticallyExposedPersonNormalizer::class,

        WatchlistFullAllOfDataSanctionsSources::class => WatchlistFullAllOfDataSanctionsSourcesNormalizer::class,

        WatchlistFullAllOfDataSanctionsRecords::class => WatchlistFullAllOfDataSanctionsRecordsNormalizer::class,

        WatchlistFullAllOfDataSanctions::class => WatchlistFullAllOfDataSanctionsNormalizer::class,

        WatchlistFullAllOfData::class => WatchlistFullAllOfDataNormalizer::class,

        WorkflowSessionActionGroupsInnerActionsInnerResolution::class => WorkflowSessionActionGroupsInnerActionsInnerResolutionNormalizer::class,

        WorkflowSessionActionGroupsInnerActionsInnerPreviousAttemptsInner::class => WorkflowSessionActionGroupsInnerActionsInnerPreviousAttemptsInnerNormalizer::class,

        WorkflowSessionActionGroupsInnerActionsInner::class => WorkflowSessionActionGroupsInnerActionsInnerNormalizer::class,

        WorkflowSessionActionGroupsInner::class => WorkflowSessionActionGroupsInnerNormalizer::class,

        NaturalPersonApplicant::class => NaturalPersonApplicantNormalizer::class,

        LegalPersonApplicant::class => LegalPersonApplicantNormalizer::class,

        WorkflowSessionLinksApplicantsInner::class => WorkflowSessionLinksApplicantsInnerNormalizer::class,

        ResolveWorkflowSessionActionResource::class => ResolveWorkflowSessionActionResourceNormalizer::class,

        WorkflowTemplateActionGroupsInner::class => WorkflowTemplateActionGroupsInnerNormalizer::class,

        WorkflowTemplateWorkspacesInner::class => WorkflowTemplateWorkspacesInnerNormalizer::class,

        WorkspaceUsersInner::class => WorkspaceUsersInnerNormalizer::class,

        FraudRiskAnalysisIndicatorsInner::class => FraudRiskAnalysisIndicatorsInnerNormalizer::class,

        InitiateSocialSecurityChecks::class => InitiateSocialSecurityChecksNormalizer::class,

        InitiateCompanyCertificateChecksLegalRepresentativesInner::class => InitiateCompanyCertificateChecksLegalRepresentativesInnerNormalizer::class,

        InitiateCompanyCertificateChecks::class => InitiateCompanyCertificateChecksNormalizer::class,

        InitiateTemporaryVehicleRegistrationDocumentChecksVehicleOwner::class => InitiateTemporaryVehicleRegistrationDocumentChecksVehicleOwnerNormalizer::class,

        InitiateTemporaryVehicleRegistrationDocumentChecks::class => InitiateTemporaryVehicleRegistrationDocumentChecksNormalizer::class,

        InitiateVehicleRegistrationDocumentChecksVehicleOwner::class => InitiateVehicleRegistrationDocumentChecksVehicleOwnerNormalizer::class,

        InitiateVehicleRegistrationDocumentChecks::class => InitiateVehicleRegistrationDocumentChecksNormalizer::class,

        InitiateAutoInsuranceClaimsHistoryChecksPolicyHolder::class => InitiateAutoInsuranceClaimsHistoryChecksPolicyHolderNormalizer::class,

        InitiateAutoInsuranceClaimsHistoryChecks::class => InitiateAutoInsuranceClaimsHistoryChecksNormalizer::class,

        InitiateTaxNoticeChecksFullNameCheck::class => InitiateTaxNoticeChecksFullNameCheckNormalizer::class,

        InitiateTaxNoticeChecksIncomeYearCheck::class => InitiateTaxNoticeChecksIncomeYearCheckNormalizer::class,

        InitiateTaxNoticeChecks::class => InitiateTaxNoticeChecksNormalizer::class,

        InitiatePayslipChecksFullNameCheck::class => InitiatePayslipChecksFullNameCheckNormalizer::class,

        InitiatePayslipChecks::class => InitiatePayslipChecksNormalizer::class,

        InitiateInvoiceChecks::class => InitiateInvoiceChecksNormalizer::class,

        InitiateProofOfAddress1Checks::class => InitiateProofOfAddress1ChecksNormalizer::class,

        InitiateFraudOnlyAnalysisType::class => InitiateFraudOnlyAnalysisTypeNormalizer::class,

        CompanyCertificateExtractionLegalRepresentativesInner::class => CompanyCertificateExtractionLegalRepresentativesInnerNormalizer::class,

        CompanyCertificateCheckLegalRepresentativesInner::class => CompanyCertificateCheckLegalRepresentativesInnerNormalizer::class,

        BusinessRegistrationCertificateExtractionCompanyDescription::class => BusinessRegistrationCertificateExtractionCompanyDescriptionNormalizer::class,

        BusinessRegistrationCertificateExtractionBranchDescription::class => BusinessRegistrationCertificateExtractionBranchDescriptionNormalizer::class,

        TemporaryVehicleRegistrationDocumentExtractionVehicleOwnerInformation::class => TemporaryVehicleRegistrationDocumentExtractionVehicleOwnerInformationNormalizer::class,

        TemporaryVehicleRegistrationDocumentExtractionDocumentRecipientInformation::class => TemporaryVehicleRegistrationDocumentExtractionDocumentRecipientInformationNormalizer::class,

        TemporaryVehicleRegistrationDocumentCheckVehicleOwner::class => TemporaryVehicleRegistrationDocumentCheckVehicleOwnerNormalizer::class,

        FrenchVehicleRegistrationDocumentExtractionOwnerInformation::class => FrenchVehicleRegistrationDocumentExtractionOwnerInformationNormalizer::class,

        FrenchVehicleRegistrationDocumentExtractionCoOwnerInformationInner::class => FrenchVehicleRegistrationDocumentExtractionCoOwnerInformationInnerNormalizer::class,

        FrenchVehicleRegistrationDocumentExtractionVehicleInformation::class => FrenchVehicleRegistrationDocumentExtractionVehicleInformationNormalizer::class,

        FrenchVehicleRegistrationDocumentExtractionVehicleMotorInformation::class => FrenchVehicleRegistrationDocumentExtractionVehicleMotorInformationNormalizer::class,

        ItalianVehicleRegistrationDocumentExtractionOwnerInformation::class => ItalianVehicleRegistrationDocumentExtractionOwnerInformationNormalizer::class,

        ItalianVehicleRegistrationDocumentExtractionDeedInformationsInner::class => ItalianVehicleRegistrationDocumentExtractionDeedInformationsInnerNormalizer::class,

        ItalianVehicleRegistrationDocumentExtractionVehicleMotorInformation::class => ItalianVehicleRegistrationDocumentExtractionVehicleMotorInformationNormalizer::class,

        AutoInsuranceClaimsHistoryExtractionDriversInformationInner::class => AutoInsuranceClaimsHistoryExtractionDriversInformationInnerNormalizer::class,

        AutoInsuranceClaimsHistoryExtractionIncidentsInformationInner::class => AutoInsuranceClaimsHistoryExtractionIncidentsInformationInnerNormalizer::class,

        AutoInsuranceClaimsHistoryCheckPolicyHolder::class => AutoInsuranceClaimsHistoryCheckPolicyHolderNormalizer::class,

        FrenchTaxNoticeExtraction2dDoc::class => FrenchTaxNoticeExtraction2dDocNormalizer::class,

        TaxNoticeCheckIncomeYear::class => TaxNoticeCheckIncomeYearNormalizer::class,

        IdDocumentExtractionAddress::class => IdDocumentExtractionAddressNormalizer::class,

        IdDocumentExtractionMrz::class => IdDocumentExtractionMrzNormalizer::class,

        CreateElectronicSealFieldSealPayloadCaptionsInner::class => CreateElectronicSealFieldSealPayloadCaptionsInnerNormalizer::class,

        SignatureRequestSignerFromInfoInputInfo::class => SignatureRequestSignerFromInfoInputInfoNormalizer::class,

        SignatureRequestSignerFromInfoInputRedirectUrls::class => SignatureRequestSignerFromInfoInputRedirectUrlsNormalizer::class,

        SignatureRequestSignerFromInfoInputCustomText::class => SignatureRequestSignerFromInfoInputCustomTextNormalizer::class,

        SignatureRequestEmailNotificationCustomText::class => SignatureRequestEmailNotificationCustomTextNormalizer::class,

        SignatureRequestPlaceholderSignerSubstituteFromInfoInputInfo::class => SignatureRequestPlaceholderSignerSubstituteFromInfoInputInfoNormalizer::class,

        SignatureRequestPlaceholderSignerSubstituteFromInfoInputRedirectUrls::class => SignatureRequestPlaceholderSignerSubstituteFromInfoInputRedirectUrlsNormalizer::class,

        SignatureRequestPlaceholderSignerSubstituteFromContactIdInputRedirectUrls::class => SignatureRequestPlaceholderSignerSubstituteFromContactIdInputRedirectUrlsNormalizer::class,

        SignatureRequestPlaceholderSignerSubstituteFromContactIdInputCustomText::class => SignatureRequestPlaceholderSignerSubstituteFromContactIdInputCustomTextNormalizer::class,

        SignatureDisplayOneOf::class => SignatureDisplayOneOfNormalizer::class,

        SignatureDisplayOneOf1Options::class => SignatureDisplayOneOf1OptionsNormalizer::class,

        SignatureDisplayOneOf1::class => SignatureDisplayOneOf1Normalizer::class,

        MinimalLayout::class => MinimalLayoutNormalizer::class,

        DetailedLayout::class => DetailedLayoutNormalizer::class,

        Signature2::class => Signature2Normalizer::class,

        Mention2::class => Mention2Normalizer::class,

        Text2::class => Text2Normalizer::class,

        Checkbox2::class => Checkbox2Normalizer::class,

        RadioGroup2RadiosInner::class => RadioGroup2RadiosInnerNormalizer::class,

        RadioGroup2::class => RadioGroup2Normalizer::class,

        OtpMessage::class => OTPMessageNormalizer::class,

        Reference::class => ReferenceNormalizer::class,
    ];
    protected $normalizersCache = [];

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return \array_key_exists($type, $this->normalizers);
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && \array_key_exists($data::class, $this->normalizers);
    }

    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $normalizerClass = $this->normalizers[$data::class];
        $normalizer = $this->getNormalizer($normalizerClass);

        return $normalizer->normalize($data, $format, $context);
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $denormalizerClass = $this->normalizers[$type];
        $denormalizer = $this->getNormalizer($denormalizerClass);

        return $denormalizer->denormalize($data, $type, $format, $context);
    }

    private function getNormalizer(string $normalizerClass)
    {
        return $this->normalizersCache[$normalizerClass] ?? $this->initNormalizer($normalizerClass);
    }

    private function initNormalizer(string $normalizerClass): object
    {
        $normalizer = new $normalizerClass();
        $normalizer->setNormalizer($this->normalizer);
        $normalizer->setDenormalizer($this->denormalizer);
        $this->normalizersCache[$normalizerClass] = $normalizer;

        return $normalizer;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return array_combine(array_keys($this->normalizers), array_fill(0, \count($this->normalizers), false));
    }
}
