<?php

namespace Qdequippe\Yousign\Api\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Qdequippe\Yousign\Api\Model\AddonConsumption;
use Qdequippe\Yousign\Api\Model\Approver;
use Qdequippe\Yousign\Api\Model\ApproverInfo;
use Qdequippe\Yousign\Api\Model\ApproverToNotify;
use Qdequippe\Yousign\Api\Model\ArchivedFile;
use Qdequippe\Yousign\Api\Model\BadRequestResponse;
use Qdequippe\Yousign\Api\Model\BankAccountVerification;
use Qdequippe\Yousign\Api\Model\BankAccountVerificationCreated;
use Qdequippe\Yousign\Api\Model\BankAccountVerificationExtractedFromDocument;
use Qdequippe\Yousign\Api\Model\Checkbox;
use Qdequippe\Yousign\Api\Model\Checkbox1;
use Qdequippe\Yousign\Api\Model\Checkbox2;
use Qdequippe\Yousign\Api\Model\Consumption;
use Qdequippe\Yousign\Api\Model\ConsumptionApi;
use Qdequippe\Yousign\Api\Model\ConsumptionApp;
use Qdequippe\Yousign\Api\Model\ConsumptionAppQualifiedElectronicSignatureIdentificationMode;
use Qdequippe\Yousign\Api\Model\ConsumptionAppQualifiedElectronicSignatureIdentificationModeIdentityVerification;
use Qdequippe\Yousign\Api\Model\Contact;
use Qdequippe\Yousign\Api\Model\CreateBankAccountVerification;
use Qdequippe\Yousign\Api\Model\CreateContact;
use Qdequippe\Yousign\Api\Model\CreateCustomExperience;
use Qdequippe\Yousign\Api\Model\CreateCustomExperienceRedirectUrls;
use Qdequippe\Yousign\Api\Model\CreateDocumentFromJson;
use Qdequippe\Yousign\Api\Model\CreateDocumentFromMultipart;
use Qdequippe\Yousign\Api\Model\CreateElectronicSealDocument;
use Qdequippe\Yousign\Api\Model\CreateElectronicSealDocumentFromJson;
use Qdequippe\Yousign\Api\Model\CreateElectronicSealFieldReadOnlyTextPayload;
use Qdequippe\Yousign\Api\Model\CreateElectronicSealFieldSealPayload;
use Qdequippe\Yousign\Api\Model\CreateElectronicSealPayload;
use Qdequippe\Yousign\Api\Model\CreateFieldFont;
use Qdequippe\Yousign\Api\Model\CreateFollowersInner;
use Qdequippe\Yousign\Api\Model\CreateIdDocumentVerification;
use Qdequippe\Yousign\Api\Model\CreateSignatureRequest;
use Qdequippe\Yousign\Api\Model\CreateSignatureRequestReminderSettings;
use Qdequippe\Yousign\Api\Model\CreateSignatureRequestTemplatePlaceholders;
use Qdequippe\Yousign\Api\Model\CreateSignerConsentRequest;
use Qdequippe\Yousign\Api\Model\CreateSignerConsentRequestSettings;
use Qdequippe\Yousign\Api\Model\CreateSignerDocumentRequest;
use Qdequippe\Yousign\Api\Model\CreateUser;
use Qdequippe\Yousign\Api\Model\CreateVideoIdentityVerification;
use Qdequippe\Yousign\Api\Model\CreateWebhookSubscription;
use Qdequippe\Yousign\Api\Model\CreateWorkspace;
use Qdequippe\Yousign\Api\Model\CustomExperience;
use Qdequippe\Yousign\Api\Model\CustomExperienceRedirectUrls;
use Qdequippe\Yousign\Api\Model\DeleteWorkspace;
use Qdequippe\Yousign\Api\Model\DetailedConsumption;
use Qdequippe\Yousign\Api\Model\Document;
use Qdequippe\Yousign\Api\Model\DocumentInitials;
use Qdequippe\Yousign\Api\Model\ElectronicSeal;
use Qdequippe\Yousign\Api\Model\ElectronicSealAuditTrail;
use Qdequippe\Yousign\Api\Model\ElectronicSealDocument;
use Qdequippe\Yousign\Api\Model\ElectronicSealImage;
use Qdequippe\Yousign\Api\Model\EmbeddedSignerWithSignatureLink;
use Qdequippe\Yousign\Api\Model\FieldCheckbox;
use Qdequippe\Yousign\Api\Model\FieldMention;
use Qdequippe\Yousign\Api\Model\FieldRadioButtonGroup;
use Qdequippe\Yousign\Api\Model\FieldRadioButtonGroupRadiosInner;
use Qdequippe\Yousign\Api\Model\FieldReadOnlyText;
use Qdequippe\Yousign\Api\Model\FieldSignature;
use Qdequippe\Yousign\Api\Model\FieldText;
use Qdequippe\Yousign\Api\Model\Follower;
use Qdequippe\Yousign\Api\Model\Font;
use Qdequippe\Yousign\Api\Model\FontVariants;
use Qdequippe\Yousign\Api\Model\ForbiddenResponse;
use Qdequippe\Yousign\Api\Model\FromExistingContact;
use Qdequippe\Yousign\Api\Model\FromExistingContact1;
use Qdequippe\Yousign\Api\Model\FromExistingSigner;
use Qdequippe\Yousign\Api\Model\FromExistingUser;
use Qdequippe\Yousign\Api\Model\FromExistingUser1;
use Qdequippe\Yousign\Api\Model\FromScratch;
use Qdequippe\Yousign\Api\Model\FromScratch1;
use Qdequippe\Yousign\Api\Model\FromScratch1CustomText;
use Qdequippe\Yousign\Api\Model\FromScratch1Info;
use Qdequippe\Yousign\Api\Model\FromScratch1RedirectUrls;
use Qdequippe\Yousign\Api\Model\FromScratchInfo;
use Qdequippe\Yousign\Api\Model\GetConsumptionAddon200Response;
use Qdequippe\Yousign\Api\Model\GetConsumptionDetail200Response;
use Qdequippe\Yousign\Api\Model\GetContacts200Response;
use Qdequippe\Yousign\Api\Model\GetCustomExperiences200Response;
use Qdequippe\Yousign\Api\Model\GetInvitations200Response;
use Qdequippe\Yousign\Api\Model\GetSignatureRequests200Response;
use Qdequippe\Yousign\Api\Model\GetSignatureRequestsSignatureRequestIdDocumentsDocumentIdFields200Response;
use Qdequippe\Yousign\Api\Model\GetSignatureRequestsSignatureRequestIdFollowers200Response;
use Qdequippe\Yousign\Api\Model\GetSignatureRequestsSignatureRequestIdSignerConsentRequests200Response;
use Qdequippe\Yousign\Api\Model\GetSignatureRequestsSignatureRequestIdSignerDocumentRequests200Response;
use Qdequippe\Yousign\Api\Model\GetSignatureRequestsSignatureRequestIdSignersSignerIdDocuments200Response;
use Qdequippe\Yousign\Api\Model\GetTemplates200Response;
use Qdequippe\Yousign\Api\Model\GetUsers200Response;
use Qdequippe\Yousign\Api\Model\GetWorkspaces200Response;
use Qdequippe\Yousign\Api\Model\IdDocumentVerification;
use Qdequippe\Yousign\Api\Model\IdDocumentVerificationCreated;
use Qdequippe\Yousign\Api\Model\IdDocumentVerificationExtractedFromDocument;
use Qdequippe\Yousign\Api\Model\IdDocumentVerificationExtractedFromDocumentMrz;
use Qdequippe\Yousign\Api\Model\InitialsArea;
use Qdequippe\Yousign\Api\Model\InternalServerError;
use Qdequippe\Yousign\Api\Model\ListElectronicSealImages200Response;
use Qdequippe\Yousign\Api\Model\MarkWorkspaceAsDefault;
use Qdequippe\Yousign\Api\Model\Mention;
use Qdequippe\Yousign\Api\Model\Mention1;
use Qdequippe\Yousign\Api\Model\Mention2;
use Qdequippe\Yousign\Api\Model\Metadata;
use Qdequippe\Yousign\Api\Model\NotFoundResponse;
use Qdequippe\Yousign\Api\Model\OtpMessage;
use Qdequippe\Yousign\Api\Model\Pagination;
use Qdequippe\Yousign\Api\Model\PaginationWithUpdatedAt;
use Qdequippe\Yousign\Api\Model\PatchCustomExperienceLogoRequest;
use Qdequippe\Yousign\Api\Model\PatchSignatureRequestsSignatureRequestIdApproversApproverIdRequest;
use Qdequippe\Yousign\Api\Model\PatchSignatureRequestsSignatureRequestIdApproversApproverIdRequestInfo;
use Qdequippe\Yousign\Api\Model\PostSignatureRequestsSignatureRequestIdCancelRequest;
use Qdequippe\Yousign\Api\Model\PostSignatureRequestsSignatureRequestIdDocumentsDocumentIdReplaceRequest;
use Qdequippe\Yousign\Api\Model\PostSignatureRequestsSignatureRequestIdReactivateRequest;
use Qdequippe\Yousign\Api\Model\RadioGroup;
use Qdequippe\Yousign\Api\Model\RadioGroup1;
use Qdequippe\Yousign\Api\Model\RadioGroup1RadiosInner;
use Qdequippe\Yousign\Api\Model\RadioGroup2;
use Qdequippe\Yousign\Api\Model\RadioGroup2RadiosInner;
use Qdequippe\Yousign\Api\Model\RadioGroupRadiosInner;
use Qdequippe\Yousign\Api\Model\ReadOnlyText;
use Qdequippe\Yousign\Api\Model\ReadOnlyText1;
use Qdequippe\Yousign\Api\Model\Signature;
use Qdequippe\Yousign\Api\Model\Signature1;
use Qdequippe\Yousign\Api\Model\Signature2;
use Qdequippe\Yousign\Api\Model\SignatureRequest;
use Qdequippe\Yousign\Api\Model\SignatureRequestActivated;
use Qdequippe\Yousign\Api\Model\SignatureRequestActivatedDocumentsInner;
use Qdequippe\Yousign\Api\Model\SignatureRequestDeclineInformation;
use Qdequippe\Yousign\Api\Model\SignatureRequestEmailNotification;
use Qdequippe\Yousign\Api\Model\SignatureRequestEmailNotificationSender;
use Qdequippe\Yousign\Api\Model\SignatureRequestInList;
use Qdequippe\Yousign\Api\Model\SignatureRequestInListApproversInner;
use Qdequippe\Yousign\Api\Model\SignatureRequestInListDocumentsInner;
use Qdequippe\Yousign\Api\Model\SignatureRequestInListReminderSettings;
use Qdequippe\Yousign\Api\Model\SignatureRequestInListSender;
use Qdequippe\Yousign\Api\Model\SignatureRequestInListSignersInner;
use Qdequippe\Yousign\Api\Model\SignatureRequestPlaceholderReadOnlyTextFieldSubstituteInput;
use Qdequippe\Yousign\Api\Model\SignatureRequestPlaceholderSignerSubstituteFromContactIdInput;
use Qdequippe\Yousign\Api\Model\SignatureRequestPlaceholderSignerSubstituteFromInfoInput;
use Qdequippe\Yousign\Api\Model\SignatureRequestPlaceholderSignerSubstituteFromInfoInputInfo;
use Qdequippe\Yousign\Api\Model\SignatureRequestPlaceholderSignerSubstituteFromUserIdInput;
use Qdequippe\Yousign\Api\Model\SignatureRequestSignerFromContactIdInput;
use Qdequippe\Yousign\Api\Model\SignatureRequestSignerFromInfoInput;
use Qdequippe\Yousign\Api\Model\SignatureRequestSignerFromInfoInputInfo;
use Qdequippe\Yousign\Api\Model\SignatureRequestSignerFromInfoInputRedirectUrls;
use Qdequippe\Yousign\Api\Model\SignatureRequestSignerFromUserIdInput;
use Qdequippe\Yousign\Api\Model\Signer;
use Qdequippe\Yousign\Api\Model\SignerAuditTrail;
use Qdequippe\Yousign\Api\Model\SignerConsentRequest;
use Qdequippe\Yousign\Api\Model\SignerConsentRequestSettings;
use Qdequippe\Yousign\Api\Model\SignerCustomText;
use Qdequippe\Yousign\Api\Model\SignerDocument;
use Qdequippe\Yousign\Api\Model\SignerDocumentRequest;
use Qdequippe\Yousign\Api\Model\SignerInfo;
use Qdequippe\Yousign\Api\Model\SignerRedirectUrls;
use Qdequippe\Yousign\Api\Model\SignerSign;
use Qdequippe\Yousign\Api\Model\SignerSignWithUploadedSignatureImage;
use Qdequippe\Yousign\Api\Model\SmsNotification;
use Qdequippe\Yousign\Api\Model\SmsNotification1;
use Qdequippe\Yousign\Api\Model\Template;
use Qdequippe\Yousign\Api\Model\Text;
use Qdequippe\Yousign\Api\Model\Text1;
use Qdequippe\Yousign\Api\Model\Text2;
use Qdequippe\Yousign\Api\Model\TooManyRequestsResponse;
use Qdequippe\Yousign\Api\Model\UnauthorizedResponse;
use Qdequippe\Yousign\Api\Model\UnsupportedMediaTypeResponse;
use Qdequippe\Yousign\Api\Model\UpdateContact;
use Qdequippe\Yousign\Api\Model\UpdateCustomExperience;
use Qdequippe\Yousign\Api\Model\UpdateCustomExperienceRedirectUrls;
use Qdequippe\Yousign\Api\Model\UpdateDocument;
use Qdequippe\Yousign\Api\Model\UpdateFieldFont;
use Qdequippe\Yousign\Api\Model\UpdateSignatureRequest;
use Qdequippe\Yousign\Api\Model\UpdateSignatureRequestReminderSettings;
use Qdequippe\Yousign\Api\Model\UpdateSigner;
use Qdequippe\Yousign\Api\Model\UpdateSignerConsentRequest;
use Qdequippe\Yousign\Api\Model\UpdateSignerInfo;
use Qdequippe\Yousign\Api\Model\UpdateUser;
use Qdequippe\Yousign\Api\Model\UpdateWebhookSubscription;
use Qdequippe\Yousign\Api\Model\UpdateWorkspace;
use Qdequippe\Yousign\Api\Model\UploadArchivedFile;
use Qdequippe\Yousign\Api\Model\UploadElectronicSealImage;
use Qdequippe\Yousign\Api\Model\User;
use Qdequippe\Yousign\Api\Model\UserInvitation;
use Qdequippe\Yousign\Api\Model\UserWorkspacesInner;
use Qdequippe\Yousign\Api\Model\VideoIdentityVerification;
use Qdequippe\Yousign\Api\Model\VideoIdentityVerificationCreated;
use Qdequippe\Yousign\Api\Model\VideoIdentityVerificationDeclared;
use Qdequippe\Yousign\Api\Model\VideoIdentityVerificationDocument;
use Qdequippe\Yousign\Api\Model\VideoIdentityVerificationVerified;
use Qdequippe\Yousign\Api\Model\WebhookSubscription;
use Qdequippe\Yousign\Api\Model\Workspace;
use Qdequippe\Yousign\Api\Model\WorkspaceUsersInner;
use Qdequippe\Yousign\Api\Runtime\Normalizer\CheckArray;
use Qdequippe\Yousign\Api\Runtime\Normalizer\ReferenceNormalizer;
use Qdequippe\Yousign\Api\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

if (!class_exists(Kernel::class) || (Kernel::MAJOR_VERSION >= 7 || Kernel::MAJOR_VERSION === 6 && Kernel::MINOR_VERSION === 4)) {
    class JaneObjectNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use CheckArray;
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use ValidatorTrait;
        protected $normalizers = [
            UploadArchivedFile::class => UploadArchivedFileNormalizer::class,

            ArchivedFile::class => ArchivedFileNormalizer::class,

            CreateBankAccountVerification::class => CreateBankAccountVerificationNormalizer::class,

            BankAccountVerificationCreated::class => BankAccountVerificationCreatedNormalizer::class,

            BankAccountVerification::class => BankAccountVerificationNormalizer::class,

            Consumption::class => ConsumptionNormalizer::class,

            AddonConsumption::class => AddonConsumptionNormalizer::class,

            PaginationWithUpdatedAt::class => PaginationWithUpdatedAtNormalizer::class,

            DetailedConsumption::class => DetailedConsumptionNormalizer::class,

            Pagination::class => PaginationNormalizer::class,

            Contact::class => ContactNormalizer::class,

            CreateContact::class => CreateContactNormalizer::class,

            UpdateContact::class => UpdateContactNormalizer::class,

            CustomExperience::class => CustomExperienceNormalizer::class,

            CreateCustomExperience::class => CreateCustomExperienceNormalizer::class,

            UpdateCustomExperience::class => UpdateCustomExperienceNormalizer::class,

            CreateDocumentFromMultipart::class => CreateDocumentFromMultipartNormalizer::class,

            Document::class => DocumentNormalizer::class,

            CreateElectronicSealDocument::class => CreateElectronicSealDocumentNormalizer::class,

            CreateElectronicSealDocumentFromJson::class => CreateElectronicSealDocumentFromJsonNormalizer::class,

            ElectronicSealDocument::class => ElectronicSealDocumentNormalizer::class,

            ElectronicSealImage::class => ElectronicSealImageNormalizer::class,

            UploadElectronicSealImage::class => UploadElectronicSealImageNormalizer::class,

            CreateElectronicSealPayload::class => CreateElectronicSealPayloadNormalizer::class,

            ElectronicSeal::class => ElectronicSealNormalizer::class,

            ElectronicSealAuditTrail::class => ElectronicSealAuditTrailNormalizer::class,

            CreateIdDocumentVerification::class => CreateIdDocumentVerificationNormalizer::class,

            IdDocumentVerificationCreated::class => IdDocumentVerificationCreatedNormalizer::class,

            IdDocumentVerification::class => IdDocumentVerificationNormalizer::class,

            SignatureRequestInList::class => SignatureRequestInListNormalizer::class,

            CreateSignatureRequest::class => CreateSignatureRequestNormalizer::class,

            SignatureRequest::class => SignatureRequestNormalizer::class,

            UpdateSignatureRequest::class => UpdateSignatureRequestNormalizer::class,

            SignatureRequestActivated::class => SignatureRequestActivatedNormalizer::class,

            Approver::class => ApproverNormalizer::class,

            SignerConsentRequest::class => SignerConsentRequestNormalizer::class,

            CreateSignerConsentRequest::class => CreateSignerConsentRequestNormalizer::class,

            UpdateSignerConsentRequest::class => UpdateSignerConsentRequestNormalizer::class,

            SignerDocumentRequest::class => SignerDocumentRequestNormalizer::class,

            CreateSignerDocumentRequest::class => CreateSignerDocumentRequestNormalizer::class,

            CreateDocumentFromJson::class => CreateDocumentFromJsonNormalizer::class,

            UpdateDocument::class => UpdateDocumentNormalizer::class,

            FieldSignature::class => FieldSignatureNormalizer::class,

            FieldText::class => FieldTextNormalizer::class,

            FieldMention::class => FieldMentionNormalizer::class,

            FieldCheckbox::class => FieldCheckboxNormalizer::class,

            FieldRadioButtonGroup::class => FieldRadioButtonGroupNormalizer::class,

            FieldReadOnlyText::class => FieldReadOnlyTextNormalizer::class,

            Follower::class => FollowerNormalizer::class,

            Metadata::class => MetadataNormalizer::class,

            Signer::class => SignerNormalizer::class,

            UpdateSigner::class => UpdateSignerNormalizer::class,

            SignerAuditTrail::class => SignerAuditTrailNormalizer::class,

            SignerDocument::class => SignerDocumentNormalizer::class,

            SignerSign::class => SignerSignNormalizer::class,

            SignerSignWithUploadedSignatureImage::class => SignerSignWithUploadedSignatureImageNormalizer::class,

            Template::class => TemplateNormalizer::class,

            User::class => UserNormalizer::class,

            CreateUser::class => CreateUserNormalizer::class,

            UserInvitation::class => UserInvitationNormalizer::class,

            UpdateUser::class => UpdateUserNormalizer::class,

            CreateVideoIdentityVerification::class => CreateVideoIdentityVerificationNormalizer::class,

            VideoIdentityVerificationCreated::class => VideoIdentityVerificationCreatedNormalizer::class,

            VideoIdentityVerification::class => VideoIdentityVerificationNormalizer::class,

            WebhookSubscription::class => WebhookSubscriptionNormalizer::class,

            CreateWebhookSubscription::class => CreateWebhookSubscriptionNormalizer::class,

            UpdateWebhookSubscription::class => UpdateWebhookSubscriptionNormalizer::class,

            Workspace::class => WorkspaceNormalizer::class,

            CreateWorkspace::class => CreateWorkspaceNormalizer::class,

            MarkWorkspaceAsDefault::class => MarkWorkspaceAsDefaultNormalizer::class,

            DeleteWorkspace::class => DeleteWorkspaceNormalizer::class,

            UpdateWorkspace::class => UpdateWorkspaceNormalizer::class,

            InitialsArea::class => InitialsAreaNormalizer::class,

            CreateElectronicSealFieldSealPayload::class => CreateElectronicSealFieldSealPayloadNormalizer::class,

            CreateElectronicSealFieldReadOnlyTextPayload::class => CreateElectronicSealFieldReadOnlyTextPayloadNormalizer::class,

            SignatureRequestSignerFromInfoInput::class => SignatureRequestSignerFromInfoInputNormalizer::class,

            SignatureRequestSignerFromUserIdInput::class => SignatureRequestSignerFromUserIdInputNormalizer::class,

            SignatureRequestSignerFromContactIdInput::class => SignatureRequestSignerFromContactIdInputNormalizer::class,

            SignatureRequestEmailNotification::class => SignatureRequestEmailNotificationNormalizer::class,

            SignatureRequestPlaceholderSignerSubstituteFromInfoInput::class => SignatureRequestPlaceholderSignerSubstituteFromInfoInputNormalizer::class,

            SignatureRequestPlaceholderSignerSubstituteFromUserIdInput::class => SignatureRequestPlaceholderSignerSubstituteFromUserIdInputNormalizer::class,

            SignatureRequestPlaceholderSignerSubstituteFromContactIdInput::class => SignatureRequestPlaceholderSignerSubstituteFromContactIdInputNormalizer::class,

            SignatureRequestPlaceholderReadOnlyTextFieldSubstituteInput::class => SignatureRequestPlaceholderReadOnlyTextFieldSubstituteInputNormalizer::class,

            EmbeddedSignerWithSignatureLink::class => EmbeddedSignerWithSignatureLinkNormalizer::class,

            ApproverToNotify::class => ApproverToNotifyNormalizer::class,

            Font::class => FontNormalizer::class,

            CreateFieldFont::class => CreateFieldFontNormalizer::class,

            UpdateFieldFont::class => UpdateFieldFontNormalizer::class,

            SmsNotification::class => SmsNotificationNormalizer::class,

            SmsNotification1::class => SmsNotification1Normalizer::class,

            VideoIdentityVerificationVerified::class => VideoIdentityVerificationVerifiedNormalizer::class,

            VideoIdentityVerificationDeclared::class => VideoIdentityVerificationDeclaredNormalizer::class,

            VideoIdentityVerificationDocument::class => VideoIdentityVerificationDocumentNormalizer::class,

            SignatureRequestEmailNotificationSender::class => SignatureRequestEmailNotificationSenderNormalizer::class,

            FontVariants::class => FontVariantsNormalizer::class,

            OtpMessage::class => OtpMessageNormalizer::class,

            BadRequestResponse::class => BadRequestResponseNormalizer::class,

            UnauthorizedResponse::class => UnauthorizedResponseNormalizer::class,

            ForbiddenResponse::class => ForbiddenResponseNormalizer::class,

            NotFoundResponse::class => NotFoundResponseNormalizer::class,

            UnsupportedMediaTypeResponse::class => UnsupportedMediaTypeResponseNormalizer::class,

            TooManyRequestsResponse::class => TooManyRequestsResponseNormalizer::class,

            InternalServerError::class => InternalServerErrorNormalizer::class,

            GetConsumptionAddon200Response::class => GetConsumptionAddon200ResponseNormalizer::class,

            GetConsumptionDetail200Response::class => GetConsumptionDetail200ResponseNormalizer::class,

            GetContacts200Response::class => GetContacts200ResponseNormalizer::class,

            GetCustomExperiences200Response::class => GetCustomExperiences200ResponseNormalizer::class,

            PatchCustomExperienceLogoRequest::class => PatchCustomExperienceLogoRequestNormalizer::class,

            ListElectronicSealImages200Response::class => ListElectronicSealImages200ResponseNormalizer::class,

            GetSignatureRequests200Response::class => GetSignatureRequests200ResponseNormalizer::class,

            FromScratchInfo::class => FromScratchInfoNormalizer::class,

            FromScratch::class => FromScratchNormalizer::class,

            FromExistingUser::class => FromExistingUserNormalizer::class,

            FromExistingContact::class => FromExistingContactNormalizer::class,

            FromExistingSigner::class => FromExistingSignerNormalizer::class,

            PatchSignatureRequestsSignatureRequestIdApproversApproverIdRequestInfo::class => PatchSignatureRequestsSignatureRequestIdApproversApproverIdRequestInfoNormalizer::class,

            PatchSignatureRequestsSignatureRequestIdApproversApproverIdRequest::class => PatchSignatureRequestsSignatureRequestIdApproversApproverIdRequestNormalizer::class,

            PostSignatureRequestsSignatureRequestIdCancelRequest::class => PostSignatureRequestsSignatureRequestIdCancelRequestNormalizer::class,

            GetSignatureRequestsSignatureRequestIdSignerConsentRequests200Response::class => GetSignatureRequestsSignatureRequestIdSignerConsentRequests200ResponseNormalizer::class,

            GetSignatureRequestsSignatureRequestIdSignerDocumentRequests200Response::class => GetSignatureRequestsSignatureRequestIdSignerDocumentRequests200ResponseNormalizer::class,

            GetSignatureRequestsSignatureRequestIdDocumentsDocumentIdFields200Response::class => GetSignatureRequestsSignatureRequestIdDocumentsDocumentIdFields200ResponseNormalizer::class,

            PostSignatureRequestsSignatureRequestIdDocumentsDocumentIdReplaceRequest::class => PostSignatureRequestsSignatureRequestIdDocumentsDocumentIdReplaceRequestNormalizer::class,

            GetSignatureRequestsSignatureRequestIdFollowers200Response::class => GetSignatureRequestsSignatureRequestIdFollowers200ResponseNormalizer::class,

            PostSignatureRequestsSignatureRequestIdReactivateRequest::class => PostSignatureRequestsSignatureRequestIdReactivateRequestNormalizer::class,

            GetSignatureRequestsSignatureRequestIdSignersSignerIdDocuments200Response::class => GetSignatureRequestsSignatureRequestIdSignersSignerIdDocuments200ResponseNormalizer::class,

            GetTemplates200Response::class => GetTemplates200ResponseNormalizer::class,

            GetUsers200Response::class => GetUsers200ResponseNormalizer::class,

            GetInvitations200Response::class => GetInvitations200ResponseNormalizer::class,

            GetWorkspaces200Response::class => GetWorkspaces200ResponseNormalizer::class,

            BankAccountVerificationExtractedFromDocument::class => BankAccountVerificationExtractedFromDocumentNormalizer::class,

            ConsumptionAppQualifiedElectronicSignatureIdentificationModeIdentityVerification::class => ConsumptionAppQualifiedElectronicSignatureIdentificationModeIdentityVerificationNormalizer::class,

            ConsumptionAppQualifiedElectronicSignatureIdentificationMode::class => ConsumptionAppQualifiedElectronicSignatureIdentificationModeNormalizer::class,

            ConsumptionApp::class => ConsumptionAppNormalizer::class,

            ConsumptionApi::class => ConsumptionApiNormalizer::class,

            CustomExperienceRedirectUrls::class => CustomExperienceRedirectUrlsNormalizer::class,

            CreateCustomExperienceRedirectUrls::class => CreateCustomExperienceRedirectUrlsNormalizer::class,

            UpdateCustomExperienceRedirectUrls::class => UpdateCustomExperienceRedirectUrlsNormalizer::class,

            DocumentInitials::class => DocumentInitialsNormalizer::class,

            IdDocumentVerificationExtractedFromDocumentMrz::class => IdDocumentVerificationExtractedFromDocumentMrzNormalizer::class,

            IdDocumentVerificationExtractedFromDocument::class => IdDocumentVerificationExtractedFromDocumentNormalizer::class,

            SignatureRequestInListReminderSettings::class => SignatureRequestInListReminderSettingsNormalizer::class,

            SignatureRequestInListSignersInner::class => SignatureRequestInListSignersInnerNormalizer::class,

            SignatureRequestInListApproversInner::class => SignatureRequestInListApproversInnerNormalizer::class,

            SignatureRequestInListDocumentsInner::class => SignatureRequestInListDocumentsInnerNormalizer::class,

            SignatureRequestInListSender::class => SignatureRequestInListSenderNormalizer::class,

            CreateSignatureRequestReminderSettings::class => CreateSignatureRequestReminderSettingsNormalizer::class,

            CreateSignatureRequestTemplatePlaceholders::class => CreateSignatureRequestTemplatePlaceholdersNormalizer::class,

            SignatureRequestDeclineInformation::class => SignatureRequestDeclineInformationNormalizer::class,

            UpdateSignatureRequestReminderSettings::class => UpdateSignatureRequestReminderSettingsNormalizer::class,

            SignatureRequestActivatedDocumentsInner::class => SignatureRequestActivatedDocumentsInnerNormalizer::class,

            ApproverInfo::class => ApproverInfoNormalizer::class,

            SignerConsentRequestSettings::class => SignerConsentRequestSettingsNormalizer::class,

            CreateSignerConsentRequestSettings::class => CreateSignerConsentRequestSettingsNormalizer::class,

            FieldRadioButtonGroupRadiosInner::class => FieldRadioButtonGroupRadiosInnerNormalizer::class,

            Signature::class => SignatureNormalizer::class,

            Mention::class => MentionNormalizer::class,

            Text::class => TextNormalizer::class,

            Checkbox::class => CheckboxNormalizer::class,

            RadioGroupRadiosInner::class => RadioGroupRadiosInnerNormalizer::class,

            RadioGroup::class => RadioGroupNormalizer::class,

            ReadOnlyText::class => ReadOnlyTextNormalizer::class,

            Signature1::class => Signature1Normalizer::class,

            Mention1::class => Mention1Normalizer::class,

            Text1::class => Text1Normalizer::class,

            Checkbox1::class => Checkbox1Normalizer::class,

            RadioGroup1RadiosInner::class => RadioGroup1RadiosInnerNormalizer::class,

            RadioGroup1::class => RadioGroup1Normalizer::class,

            ReadOnlyText1::class => ReadOnlyText1Normalizer::class,

            CreateFollowersInner::class => CreateFollowersInnerNormalizer::class,

            SignerInfo::class => SignerInfoNormalizer::class,

            SignerRedirectUrls::class => SignerRedirectUrlsNormalizer::class,

            SignerCustomText::class => SignerCustomTextNormalizer::class,

            FromScratch1Info::class => FromScratch1InfoNormalizer::class,

            FromScratch1RedirectUrls::class => FromScratch1RedirectUrlsNormalizer::class,

            FromScratch1CustomText::class => FromScratch1CustomTextNormalizer::class,

            FromScratch1::class => FromScratch1Normalizer::class,

            FromExistingUser1::class => FromExistingUser1Normalizer::class,

            FromExistingContact1::class => FromExistingContact1Normalizer::class,

            UpdateSignerInfo::class => UpdateSignerInfoNormalizer::class,

            UserWorkspacesInner::class => UserWorkspacesInnerNormalizer::class,

            WorkspaceUsersInner::class => WorkspaceUsersInnerNormalizer::class,

            SignatureRequestSignerFromInfoInputInfo::class => SignatureRequestSignerFromInfoInputInfoNormalizer::class,

            SignatureRequestSignerFromInfoInputRedirectUrls::class => SignatureRequestSignerFromInfoInputRedirectUrlsNormalizer::class,

            SignatureRequestPlaceholderSignerSubstituteFromInfoInputInfo::class => SignatureRequestPlaceholderSignerSubstituteFromInfoInputInfoNormalizer::class,

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

        public function supportsDenormalization($data, $type, $format = null, array $context = []): bool
        {
            return \array_key_exists($type, $this->normalizers);
        }

        public function supportsNormalization($data, $format = null, array $context = []): bool
        {
            return \is_object($data) && \array_key_exists($data::class, $this->normalizers);
        }

        public function normalize(mixed $object, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
        {
            $normalizerClass = $this->normalizers[$object::class];
            $normalizer = $this->getNormalizer($normalizerClass);

            return $normalizer->normalize($object, $format, $context);
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

        private function initNormalizer(string $normalizerClass)
        {
            $normalizer = new $normalizerClass();
            $normalizer->setNormalizer($this->normalizer);
            $normalizer->setDenormalizer($this->denormalizer);
            $this->normalizersCache[$normalizerClass] = $normalizer;

            return $normalizer;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return [
                UploadArchivedFile::class => false,
                ArchivedFile::class => false,
                CreateBankAccountVerification::class => false,
                BankAccountVerificationCreated::class => false,
                BankAccountVerification::class => false,
                Consumption::class => false,
                AddonConsumption::class => false,
                PaginationWithUpdatedAt::class => false,
                DetailedConsumption::class => false,
                Pagination::class => false,
                Contact::class => false,
                CreateContact::class => false,
                UpdateContact::class => false,
                CustomExperience::class => false,
                CreateCustomExperience::class => false,
                UpdateCustomExperience::class => false,
                CreateDocumentFromMultipart::class => false,
                Document::class => false,
                CreateElectronicSealDocument::class => false,
                CreateElectronicSealDocumentFromJson::class => false,
                ElectronicSealDocument::class => false,
                ElectronicSealImage::class => false,
                UploadElectronicSealImage::class => false,
                CreateElectronicSealPayload::class => false,
                ElectronicSeal::class => false,
                ElectronicSealAuditTrail::class => false,
                CreateIdDocumentVerification::class => false,
                IdDocumentVerificationCreated::class => false,
                IdDocumentVerification::class => false,
                SignatureRequestInList::class => false,
                CreateSignatureRequest::class => false,
                SignatureRequest::class => false,
                UpdateSignatureRequest::class => false,
                SignatureRequestActivated::class => false,
                Approver::class => false,
                SignerConsentRequest::class => false,
                CreateSignerConsentRequest::class => false,
                UpdateSignerConsentRequest::class => false,
                SignerDocumentRequest::class => false,
                CreateSignerDocumentRequest::class => false,
                CreateDocumentFromJson::class => false,
                UpdateDocument::class => false,
                FieldSignature::class => false,
                FieldText::class => false,
                FieldMention::class => false,
                FieldCheckbox::class => false,
                FieldRadioButtonGroup::class => false,
                FieldReadOnlyText::class => false,
                Follower::class => false,
                Metadata::class => false,
                Signer::class => false,
                UpdateSigner::class => false,
                SignerAuditTrail::class => false,
                SignerDocument::class => false,
                SignerSign::class => false,
                SignerSignWithUploadedSignatureImage::class => false,
                Template::class => false,
                User::class => false,
                CreateUser::class => false,
                UserInvitation::class => false,
                UpdateUser::class => false,
                CreateVideoIdentityVerification::class => false,
                VideoIdentityVerificationCreated::class => false,
                VideoIdentityVerification::class => false,
                WebhookSubscription::class => false,
                CreateWebhookSubscription::class => false,
                UpdateWebhookSubscription::class => false,
                Workspace::class => false,
                CreateWorkspace::class => false,
                MarkWorkspaceAsDefault::class => false,
                DeleteWorkspace::class => false,
                UpdateWorkspace::class => false,
                InitialsArea::class => false,
                CreateElectronicSealFieldSealPayload::class => false,
                CreateElectronicSealFieldReadOnlyTextPayload::class => false,
                SignatureRequestSignerFromInfoInput::class => false,
                SignatureRequestSignerFromUserIdInput::class => false,
                SignatureRequestSignerFromContactIdInput::class => false,
                SignatureRequestEmailNotification::class => false,
                SignatureRequestPlaceholderSignerSubstituteFromInfoInput::class => false,
                SignatureRequestPlaceholderSignerSubstituteFromUserIdInput::class => false,
                SignatureRequestPlaceholderSignerSubstituteFromContactIdInput::class => false,
                SignatureRequestPlaceholderReadOnlyTextFieldSubstituteInput::class => false,
                EmbeddedSignerWithSignatureLink::class => false,
                ApproverToNotify::class => false,
                Font::class => false,
                CreateFieldFont::class => false,
                UpdateFieldFont::class => false,
                SmsNotification::class => false,
                SmsNotification1::class => false,
                VideoIdentityVerificationVerified::class => false,
                VideoIdentityVerificationDeclared::class => false,
                VideoIdentityVerificationDocument::class => false,
                SignatureRequestEmailNotificationSender::class => false,
                FontVariants::class => false,
                OtpMessage::class => false,
                BadRequestResponse::class => false,
                UnauthorizedResponse::class => false,
                ForbiddenResponse::class => false,
                NotFoundResponse::class => false,
                UnsupportedMediaTypeResponse::class => false,
                TooManyRequestsResponse::class => false,
                InternalServerError::class => false,
                GetConsumptionAddon200Response::class => false,
                GetConsumptionDetail200Response::class => false,
                GetContacts200Response::class => false,
                GetCustomExperiences200Response::class => false,
                PatchCustomExperienceLogoRequest::class => false,
                ListElectronicSealImages200Response::class => false,
                GetSignatureRequests200Response::class => false,
                FromScratchInfo::class => false,
                FromScratch::class => false,
                FromExistingUser::class => false,
                FromExistingContact::class => false,
                FromExistingSigner::class => false,
                PatchSignatureRequestsSignatureRequestIdApproversApproverIdRequestInfo::class => false,
                PatchSignatureRequestsSignatureRequestIdApproversApproverIdRequest::class => false,
                PostSignatureRequestsSignatureRequestIdCancelRequest::class => false,
                GetSignatureRequestsSignatureRequestIdSignerConsentRequests200Response::class => false,
                GetSignatureRequestsSignatureRequestIdSignerDocumentRequests200Response::class => false,
                GetSignatureRequestsSignatureRequestIdDocumentsDocumentIdFields200Response::class => false,
                PostSignatureRequestsSignatureRequestIdDocumentsDocumentIdReplaceRequest::class => false,
                GetSignatureRequestsSignatureRequestIdFollowers200Response::class => false,
                PostSignatureRequestsSignatureRequestIdReactivateRequest::class => false,
                GetSignatureRequestsSignatureRequestIdSignersSignerIdDocuments200Response::class => false,
                GetTemplates200Response::class => false,
                GetUsers200Response::class => false,
                GetInvitations200Response::class => false,
                GetWorkspaces200Response::class => false,
                BankAccountVerificationExtractedFromDocument::class => false,
                ConsumptionAppQualifiedElectronicSignatureIdentificationModeIdentityVerification::class => false,
                ConsumptionAppQualifiedElectronicSignatureIdentificationMode::class => false,
                ConsumptionApp::class => false,
                ConsumptionApi::class => false,
                CustomExperienceRedirectUrls::class => false,
                CreateCustomExperienceRedirectUrls::class => false,
                UpdateCustomExperienceRedirectUrls::class => false,
                DocumentInitials::class => false,
                IdDocumentVerificationExtractedFromDocumentMrz::class => false,
                IdDocumentVerificationExtractedFromDocument::class => false,
                SignatureRequestInListReminderSettings::class => false,
                SignatureRequestInListSignersInner::class => false,
                SignatureRequestInListApproversInner::class => false,
                SignatureRequestInListDocumentsInner::class => false,
                SignatureRequestInListSender::class => false,
                CreateSignatureRequestReminderSettings::class => false,
                CreateSignatureRequestTemplatePlaceholders::class => false,
                SignatureRequestDeclineInformation::class => false,
                UpdateSignatureRequestReminderSettings::class => false,
                SignatureRequestActivatedDocumentsInner::class => false,
                ApproverInfo::class => false,
                SignerConsentRequestSettings::class => false,
                CreateSignerConsentRequestSettings::class => false,
                FieldRadioButtonGroupRadiosInner::class => false,
                Signature::class => false,
                Mention::class => false,
                Text::class => false,
                Checkbox::class => false,
                RadioGroupRadiosInner::class => false,
                RadioGroup::class => false,
                ReadOnlyText::class => false,
                Signature1::class => false,
                Mention1::class => false,
                Text1::class => false,
                Checkbox1::class => false,
                RadioGroup1RadiosInner::class => false,
                RadioGroup1::class => false,
                ReadOnlyText1::class => false,
                CreateFollowersInner::class => false,
                SignerInfo::class => false,
                SignerRedirectUrls::class => false,
                SignerCustomText::class => false,
                FromScratch1Info::class => false,
                FromScratch1RedirectUrls::class => false,
                FromScratch1CustomText::class => false,
                FromScratch1::class => false,
                FromExistingUser1::class => false,
                FromExistingContact1::class => false,
                UpdateSignerInfo::class => false,
                UserWorkspacesInner::class => false,
                WorkspaceUsersInner::class => false,
                SignatureRequestSignerFromInfoInputInfo::class => false,
                SignatureRequestSignerFromInfoInputRedirectUrls::class => false,
                SignatureRequestPlaceholderSignerSubstituteFromInfoInputInfo::class => false,
                Signature2::class => false,
                Mention2::class => false,
                Text2::class => false,
                Checkbox2::class => false,
                RadioGroup2RadiosInner::class => false,
                RadioGroup2::class => false,
                OtpMessage::class => false,
                Reference::class => false,
            ];
        }
    }
} else {
    class JaneObjectNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use CheckArray;
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use ValidatorTrait;
        protected $normalizers = [
            UploadArchivedFile::class => UploadArchivedFileNormalizer::class,

            ArchivedFile::class => ArchivedFileNormalizer::class,

            CreateBankAccountVerification::class => CreateBankAccountVerificationNormalizer::class,

            BankAccountVerificationCreated::class => BankAccountVerificationCreatedNormalizer::class,

            BankAccountVerification::class => BankAccountVerificationNormalizer::class,

            Consumption::class => ConsumptionNormalizer::class,

            AddonConsumption::class => AddonConsumptionNormalizer::class,

            PaginationWithUpdatedAt::class => PaginationWithUpdatedAtNormalizer::class,

            DetailedConsumption::class => DetailedConsumptionNormalizer::class,

            Pagination::class => PaginationNormalizer::class,

            Contact::class => ContactNormalizer::class,

            CreateContact::class => CreateContactNormalizer::class,

            UpdateContact::class => UpdateContactNormalizer::class,

            CustomExperience::class => CustomExperienceNormalizer::class,

            CreateCustomExperience::class => CreateCustomExperienceNormalizer::class,

            UpdateCustomExperience::class => UpdateCustomExperienceNormalizer::class,

            CreateDocumentFromMultipart::class => CreateDocumentFromMultipartNormalizer::class,

            Document::class => DocumentNormalizer::class,

            CreateElectronicSealDocument::class => CreateElectronicSealDocumentNormalizer::class,

            CreateElectronicSealDocumentFromJson::class => CreateElectronicSealDocumentFromJsonNormalizer::class,

            ElectronicSealDocument::class => ElectronicSealDocumentNormalizer::class,

            ElectronicSealImage::class => ElectronicSealImageNormalizer::class,

            UploadElectronicSealImage::class => UploadElectronicSealImageNormalizer::class,

            CreateElectronicSealPayload::class => CreateElectronicSealPayloadNormalizer::class,

            ElectronicSeal::class => ElectronicSealNormalizer::class,

            ElectronicSealAuditTrail::class => ElectronicSealAuditTrailNormalizer::class,

            CreateIdDocumentVerification::class => CreateIdDocumentVerificationNormalizer::class,

            IdDocumentVerificationCreated::class => IdDocumentVerificationCreatedNormalizer::class,

            IdDocumentVerification::class => IdDocumentVerificationNormalizer::class,

            SignatureRequestInList::class => SignatureRequestInListNormalizer::class,

            CreateSignatureRequest::class => CreateSignatureRequestNormalizer::class,

            SignatureRequest::class => SignatureRequestNormalizer::class,

            UpdateSignatureRequest::class => UpdateSignatureRequestNormalizer::class,

            SignatureRequestActivated::class => SignatureRequestActivatedNormalizer::class,

            Approver::class => ApproverNormalizer::class,

            SignerConsentRequest::class => SignerConsentRequestNormalizer::class,

            CreateSignerConsentRequest::class => CreateSignerConsentRequestNormalizer::class,

            UpdateSignerConsentRequest::class => UpdateSignerConsentRequestNormalizer::class,

            SignerDocumentRequest::class => SignerDocumentRequestNormalizer::class,

            CreateSignerDocumentRequest::class => CreateSignerDocumentRequestNormalizer::class,

            CreateDocumentFromJson::class => CreateDocumentFromJsonNormalizer::class,

            UpdateDocument::class => UpdateDocumentNormalizer::class,

            FieldSignature::class => FieldSignatureNormalizer::class,

            FieldText::class => FieldTextNormalizer::class,

            FieldMention::class => FieldMentionNormalizer::class,

            FieldCheckbox::class => FieldCheckboxNormalizer::class,

            FieldRadioButtonGroup::class => FieldRadioButtonGroupNormalizer::class,

            FieldReadOnlyText::class => FieldReadOnlyTextNormalizer::class,

            Follower::class => FollowerNormalizer::class,

            Metadata::class => MetadataNormalizer::class,

            Signer::class => SignerNormalizer::class,

            UpdateSigner::class => UpdateSignerNormalizer::class,

            SignerAuditTrail::class => SignerAuditTrailNormalizer::class,

            SignerDocument::class => SignerDocumentNormalizer::class,

            SignerSign::class => SignerSignNormalizer::class,

            SignerSignWithUploadedSignatureImage::class => SignerSignWithUploadedSignatureImageNormalizer::class,

            Template::class => TemplateNormalizer::class,

            User::class => UserNormalizer::class,

            CreateUser::class => CreateUserNormalizer::class,

            UserInvitation::class => UserInvitationNormalizer::class,

            UpdateUser::class => UpdateUserNormalizer::class,

            CreateVideoIdentityVerification::class => CreateVideoIdentityVerificationNormalizer::class,

            VideoIdentityVerificationCreated::class => VideoIdentityVerificationCreatedNormalizer::class,

            VideoIdentityVerification::class => VideoIdentityVerificationNormalizer::class,

            WebhookSubscription::class => WebhookSubscriptionNormalizer::class,

            CreateWebhookSubscription::class => CreateWebhookSubscriptionNormalizer::class,

            UpdateWebhookSubscription::class => UpdateWebhookSubscriptionNormalizer::class,

            Workspace::class => WorkspaceNormalizer::class,

            CreateWorkspace::class => CreateWorkspaceNormalizer::class,

            MarkWorkspaceAsDefault::class => MarkWorkspaceAsDefaultNormalizer::class,

            DeleteWorkspace::class => DeleteWorkspaceNormalizer::class,

            UpdateWorkspace::class => UpdateWorkspaceNormalizer::class,

            InitialsArea::class => InitialsAreaNormalizer::class,

            CreateElectronicSealFieldSealPayload::class => CreateElectronicSealFieldSealPayloadNormalizer::class,

            CreateElectronicSealFieldReadOnlyTextPayload::class => CreateElectronicSealFieldReadOnlyTextPayloadNormalizer::class,

            SignatureRequestSignerFromInfoInput::class => SignatureRequestSignerFromInfoInputNormalizer::class,

            SignatureRequestSignerFromUserIdInput::class => SignatureRequestSignerFromUserIdInputNormalizer::class,

            SignatureRequestSignerFromContactIdInput::class => SignatureRequestSignerFromContactIdInputNormalizer::class,

            SignatureRequestEmailNotification::class => SignatureRequestEmailNotificationNormalizer::class,

            SignatureRequestPlaceholderSignerSubstituteFromInfoInput::class => SignatureRequestPlaceholderSignerSubstituteFromInfoInputNormalizer::class,

            SignatureRequestPlaceholderSignerSubstituteFromUserIdInput::class => SignatureRequestPlaceholderSignerSubstituteFromUserIdInputNormalizer::class,

            SignatureRequestPlaceholderSignerSubstituteFromContactIdInput::class => SignatureRequestPlaceholderSignerSubstituteFromContactIdInputNormalizer::class,

            SignatureRequestPlaceholderReadOnlyTextFieldSubstituteInput::class => SignatureRequestPlaceholderReadOnlyTextFieldSubstituteInputNormalizer::class,

            EmbeddedSignerWithSignatureLink::class => EmbeddedSignerWithSignatureLinkNormalizer::class,

            ApproverToNotify::class => ApproverToNotifyNormalizer::class,

            Font::class => FontNormalizer::class,

            CreateFieldFont::class => CreateFieldFontNormalizer::class,

            UpdateFieldFont::class => UpdateFieldFontNormalizer::class,

            SmsNotification::class => SmsNotificationNormalizer::class,

            SmsNotification1::class => SmsNotification1Normalizer::class,

            VideoIdentityVerificationVerified::class => VideoIdentityVerificationVerifiedNormalizer::class,

            VideoIdentityVerificationDeclared::class => VideoIdentityVerificationDeclaredNormalizer::class,

            VideoIdentityVerificationDocument::class => VideoIdentityVerificationDocumentNormalizer::class,

            SignatureRequestEmailNotificationSender::class => SignatureRequestEmailNotificationSenderNormalizer::class,

            FontVariants::class => FontVariantsNormalizer::class,

            OtpMessage::class => OtpMessageNormalizer::class,

            BadRequestResponse::class => BadRequestResponseNormalizer::class,

            UnauthorizedResponse::class => UnauthorizedResponseNormalizer::class,

            ForbiddenResponse::class => ForbiddenResponseNormalizer::class,

            NotFoundResponse::class => NotFoundResponseNormalizer::class,

            UnsupportedMediaTypeResponse::class => UnsupportedMediaTypeResponseNormalizer::class,

            TooManyRequestsResponse::class => TooManyRequestsResponseNormalizer::class,

            InternalServerError::class => InternalServerErrorNormalizer::class,

            GetConsumptionAddon200Response::class => GetConsumptionAddon200ResponseNormalizer::class,

            GetConsumptionDetail200Response::class => GetConsumptionDetail200ResponseNormalizer::class,

            GetContacts200Response::class => GetContacts200ResponseNormalizer::class,

            GetCustomExperiences200Response::class => GetCustomExperiences200ResponseNormalizer::class,

            PatchCustomExperienceLogoRequest::class => PatchCustomExperienceLogoRequestNormalizer::class,

            ListElectronicSealImages200Response::class => ListElectronicSealImages200ResponseNormalizer::class,

            GetSignatureRequests200Response::class => GetSignatureRequests200ResponseNormalizer::class,

            FromScratchInfo::class => FromScratchInfoNormalizer::class,

            FromScratch::class => FromScratchNormalizer::class,

            FromExistingUser::class => FromExistingUserNormalizer::class,

            FromExistingContact::class => FromExistingContactNormalizer::class,

            FromExistingSigner::class => FromExistingSignerNormalizer::class,

            PatchSignatureRequestsSignatureRequestIdApproversApproverIdRequestInfo::class => PatchSignatureRequestsSignatureRequestIdApproversApproverIdRequestInfoNormalizer::class,

            PatchSignatureRequestsSignatureRequestIdApproversApproverIdRequest::class => PatchSignatureRequestsSignatureRequestIdApproversApproverIdRequestNormalizer::class,

            PostSignatureRequestsSignatureRequestIdCancelRequest::class => PostSignatureRequestsSignatureRequestIdCancelRequestNormalizer::class,

            GetSignatureRequestsSignatureRequestIdSignerConsentRequests200Response::class => GetSignatureRequestsSignatureRequestIdSignerConsentRequests200ResponseNormalizer::class,

            GetSignatureRequestsSignatureRequestIdSignerDocumentRequests200Response::class => GetSignatureRequestsSignatureRequestIdSignerDocumentRequests200ResponseNormalizer::class,

            GetSignatureRequestsSignatureRequestIdDocumentsDocumentIdFields200Response::class => GetSignatureRequestsSignatureRequestIdDocumentsDocumentIdFields200ResponseNormalizer::class,

            PostSignatureRequestsSignatureRequestIdDocumentsDocumentIdReplaceRequest::class => PostSignatureRequestsSignatureRequestIdDocumentsDocumentIdReplaceRequestNormalizer::class,

            GetSignatureRequestsSignatureRequestIdFollowers200Response::class => GetSignatureRequestsSignatureRequestIdFollowers200ResponseNormalizer::class,

            PostSignatureRequestsSignatureRequestIdReactivateRequest::class => PostSignatureRequestsSignatureRequestIdReactivateRequestNormalizer::class,

            GetSignatureRequestsSignatureRequestIdSignersSignerIdDocuments200Response::class => GetSignatureRequestsSignatureRequestIdSignersSignerIdDocuments200ResponseNormalizer::class,

            GetTemplates200Response::class => GetTemplates200ResponseNormalizer::class,

            GetUsers200Response::class => GetUsers200ResponseNormalizer::class,

            GetInvitations200Response::class => GetInvitations200ResponseNormalizer::class,

            GetWorkspaces200Response::class => GetWorkspaces200ResponseNormalizer::class,

            BankAccountVerificationExtractedFromDocument::class => BankAccountVerificationExtractedFromDocumentNormalizer::class,

            ConsumptionAppQualifiedElectronicSignatureIdentificationModeIdentityVerification::class => ConsumptionAppQualifiedElectronicSignatureIdentificationModeIdentityVerificationNormalizer::class,

            ConsumptionAppQualifiedElectronicSignatureIdentificationMode::class => ConsumptionAppQualifiedElectronicSignatureIdentificationModeNormalizer::class,

            ConsumptionApp::class => ConsumptionAppNormalizer::class,

            ConsumptionApi::class => ConsumptionApiNormalizer::class,

            CustomExperienceRedirectUrls::class => CustomExperienceRedirectUrlsNormalizer::class,

            CreateCustomExperienceRedirectUrls::class => CreateCustomExperienceRedirectUrlsNormalizer::class,

            UpdateCustomExperienceRedirectUrls::class => UpdateCustomExperienceRedirectUrlsNormalizer::class,

            DocumentInitials::class => DocumentInitialsNormalizer::class,

            IdDocumentVerificationExtractedFromDocumentMrz::class => IdDocumentVerificationExtractedFromDocumentMrzNormalizer::class,

            IdDocumentVerificationExtractedFromDocument::class => IdDocumentVerificationExtractedFromDocumentNormalizer::class,

            SignatureRequestInListReminderSettings::class => SignatureRequestInListReminderSettingsNormalizer::class,

            SignatureRequestInListSignersInner::class => SignatureRequestInListSignersInnerNormalizer::class,

            SignatureRequestInListApproversInner::class => SignatureRequestInListApproversInnerNormalizer::class,

            SignatureRequestInListDocumentsInner::class => SignatureRequestInListDocumentsInnerNormalizer::class,

            SignatureRequestInListSender::class => SignatureRequestInListSenderNormalizer::class,

            CreateSignatureRequestReminderSettings::class => CreateSignatureRequestReminderSettingsNormalizer::class,

            CreateSignatureRequestTemplatePlaceholders::class => CreateSignatureRequestTemplatePlaceholdersNormalizer::class,

            SignatureRequestDeclineInformation::class => SignatureRequestDeclineInformationNormalizer::class,

            UpdateSignatureRequestReminderSettings::class => UpdateSignatureRequestReminderSettingsNormalizer::class,

            SignatureRequestActivatedDocumentsInner::class => SignatureRequestActivatedDocumentsInnerNormalizer::class,

            ApproverInfo::class => ApproverInfoNormalizer::class,

            SignerConsentRequestSettings::class => SignerConsentRequestSettingsNormalizer::class,

            CreateSignerConsentRequestSettings::class => CreateSignerConsentRequestSettingsNormalizer::class,

            FieldRadioButtonGroupRadiosInner::class => FieldRadioButtonGroupRadiosInnerNormalizer::class,

            Signature::class => SignatureNormalizer::class,

            Mention::class => MentionNormalizer::class,

            Text::class => TextNormalizer::class,

            Checkbox::class => CheckboxNormalizer::class,

            RadioGroupRadiosInner::class => RadioGroupRadiosInnerNormalizer::class,

            RadioGroup::class => RadioGroupNormalizer::class,

            ReadOnlyText::class => ReadOnlyTextNormalizer::class,

            Signature1::class => Signature1Normalizer::class,

            Mention1::class => Mention1Normalizer::class,

            Text1::class => Text1Normalizer::class,

            Checkbox1::class => Checkbox1Normalizer::class,

            RadioGroup1RadiosInner::class => RadioGroup1RadiosInnerNormalizer::class,

            RadioGroup1::class => RadioGroup1Normalizer::class,

            ReadOnlyText1::class => ReadOnlyText1Normalizer::class,

            CreateFollowersInner::class => CreateFollowersInnerNormalizer::class,

            SignerInfo::class => SignerInfoNormalizer::class,

            SignerRedirectUrls::class => SignerRedirectUrlsNormalizer::class,

            SignerCustomText::class => SignerCustomTextNormalizer::class,

            FromScratch1Info::class => FromScratch1InfoNormalizer::class,

            FromScratch1RedirectUrls::class => FromScratch1RedirectUrlsNormalizer::class,

            FromScratch1CustomText::class => FromScratch1CustomTextNormalizer::class,

            FromScratch1::class => FromScratch1Normalizer::class,

            FromExistingUser1::class => FromExistingUser1Normalizer::class,

            FromExistingContact1::class => FromExistingContact1Normalizer::class,

            UpdateSignerInfo::class => UpdateSignerInfoNormalizer::class,

            UserWorkspacesInner::class => UserWorkspacesInnerNormalizer::class,

            WorkspaceUsersInner::class => WorkspaceUsersInnerNormalizer::class,

            SignatureRequestSignerFromInfoInputInfo::class => SignatureRequestSignerFromInfoInputInfoNormalizer::class,

            SignatureRequestSignerFromInfoInputRedirectUrls::class => SignatureRequestSignerFromInfoInputRedirectUrlsNormalizer::class,

            SignatureRequestPlaceholderSignerSubstituteFromInfoInputInfo::class => SignatureRequestPlaceholderSignerSubstituteFromInfoInputInfoNormalizer::class,

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

        public function supportsDenormalization($data, $type, $format = null, array $context = []): bool
        {
            return \array_key_exists($type, $this->normalizers);
        }

        public function supportsNormalization($data, $format = null, array $context = []): bool
        {
            return \is_object($data) && \array_key_exists($data::class, $this->normalizers);
        }

        /**
         * @param mixed|null $format
         */
        public function normalize($object, $format = null, array $context = []): string|int|float|bool|\ArrayObject|array|null
        {
            $normalizerClass = $this->normalizers[$object::class];
            $normalizer = $this->getNormalizer($normalizerClass);

            return $normalizer->normalize($object, $format, $context);
        }

        /**
         * @param mixed|null $format
         */
        public function denormalize($data, $type, $format = null, array $context = []): mixed
        {
            $denormalizerClass = $this->normalizers[$type];
            $denormalizer = $this->getNormalizer($denormalizerClass);

            return $denormalizer->denormalize($data, $type, $format, $context);
        }

        private function getNormalizer(string $normalizerClass)
        {
            return $this->normalizersCache[$normalizerClass] ?? $this->initNormalizer($normalizerClass);
        }

        private function initNormalizer(string $normalizerClass)
        {
            $normalizer = new $normalizerClass();
            $normalizer->setNormalizer($this->normalizer);
            $normalizer->setDenormalizer($this->denormalizer);
            $this->normalizersCache[$normalizerClass] = $normalizer;

            return $normalizer;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return [
                UploadArchivedFile::class => false,
                ArchivedFile::class => false,
                CreateBankAccountVerification::class => false,
                BankAccountVerificationCreated::class => false,
                BankAccountVerification::class => false,
                Consumption::class => false,
                AddonConsumption::class => false,
                PaginationWithUpdatedAt::class => false,
                DetailedConsumption::class => false,
                Pagination::class => false,
                Contact::class => false,
                CreateContact::class => false,
                UpdateContact::class => false,
                CustomExperience::class => false,
                CreateCustomExperience::class => false,
                UpdateCustomExperience::class => false,
                CreateDocumentFromMultipart::class => false,
                Document::class => false,
                CreateElectronicSealDocument::class => false,
                CreateElectronicSealDocumentFromJson::class => false,
                ElectronicSealDocument::class => false,
                ElectronicSealImage::class => false,
                UploadElectronicSealImage::class => false,
                CreateElectronicSealPayload::class => false,
                ElectronicSeal::class => false,
                ElectronicSealAuditTrail::class => false,
                CreateIdDocumentVerification::class => false,
                IdDocumentVerificationCreated::class => false,
                IdDocumentVerification::class => false,
                SignatureRequestInList::class => false,
                CreateSignatureRequest::class => false,
                SignatureRequest::class => false,
                UpdateSignatureRequest::class => false,
                SignatureRequestActivated::class => false,
                Approver::class => false,
                SignerConsentRequest::class => false,
                CreateSignerConsentRequest::class => false,
                UpdateSignerConsentRequest::class => false,
                SignerDocumentRequest::class => false,
                CreateSignerDocumentRequest::class => false,
                CreateDocumentFromJson::class => false,
                UpdateDocument::class => false,
                FieldSignature::class => false,
                FieldText::class => false,
                FieldMention::class => false,
                FieldCheckbox::class => false,
                FieldRadioButtonGroup::class => false,
                FieldReadOnlyText::class => false,
                Follower::class => false,
                Metadata::class => false,
                Signer::class => false,
                UpdateSigner::class => false,
                SignerAuditTrail::class => false,
                SignerDocument::class => false,
                SignerSign::class => false,
                SignerSignWithUploadedSignatureImage::class => false,
                Template::class => false,
                User::class => false,
                CreateUser::class => false,
                UserInvitation::class => false,
                UpdateUser::class => false,
                CreateVideoIdentityVerification::class => false,
                VideoIdentityVerificationCreated::class => false,
                VideoIdentityVerification::class => false,
                WebhookSubscription::class => false,
                CreateWebhookSubscription::class => false,
                UpdateWebhookSubscription::class => false,
                Workspace::class => false,
                CreateWorkspace::class => false,
                MarkWorkspaceAsDefault::class => false,
                DeleteWorkspace::class => false,
                UpdateWorkspace::class => false,
                InitialsArea::class => false,
                CreateElectronicSealFieldSealPayload::class => false,
                CreateElectronicSealFieldReadOnlyTextPayload::class => false,
                SignatureRequestSignerFromInfoInput::class => false,
                SignatureRequestSignerFromUserIdInput::class => false,
                SignatureRequestSignerFromContactIdInput::class => false,
                SignatureRequestEmailNotification::class => false,
                SignatureRequestPlaceholderSignerSubstituteFromInfoInput::class => false,
                SignatureRequestPlaceholderSignerSubstituteFromUserIdInput::class => false,
                SignatureRequestPlaceholderSignerSubstituteFromContactIdInput::class => false,
                SignatureRequestPlaceholderReadOnlyTextFieldSubstituteInput::class => false,
                EmbeddedSignerWithSignatureLink::class => false,
                ApproverToNotify::class => false,
                Font::class => false,
                CreateFieldFont::class => false,
                UpdateFieldFont::class => false,
                SmsNotification::class => false,
                SmsNotification1::class => false,
                VideoIdentityVerificationVerified::class => false,
                VideoIdentityVerificationDeclared::class => false,
                VideoIdentityVerificationDocument::class => false,
                SignatureRequestEmailNotificationSender::class => false,
                FontVariants::class => false,
                OtpMessage::class => false,
                BadRequestResponse::class => false,
                UnauthorizedResponse::class => false,
                ForbiddenResponse::class => false,
                NotFoundResponse::class => false,
                UnsupportedMediaTypeResponse::class => false,
                TooManyRequestsResponse::class => false,
                InternalServerError::class => false,
                GetConsumptionAddon200Response::class => false,
                GetConsumptionDetail200Response::class => false,
                GetContacts200Response::class => false,
                GetCustomExperiences200Response::class => false,
                PatchCustomExperienceLogoRequest::class => false,
                ListElectronicSealImages200Response::class => false,
                GetSignatureRequests200Response::class => false,
                FromScratchInfo::class => false,
                FromScratch::class => false,
                FromExistingUser::class => false,
                FromExistingContact::class => false,
                FromExistingSigner::class => false,
                PatchSignatureRequestsSignatureRequestIdApproversApproverIdRequestInfo::class => false,
                PatchSignatureRequestsSignatureRequestIdApproversApproverIdRequest::class => false,
                PostSignatureRequestsSignatureRequestIdCancelRequest::class => false,
                GetSignatureRequestsSignatureRequestIdSignerConsentRequests200Response::class => false,
                GetSignatureRequestsSignatureRequestIdSignerDocumentRequests200Response::class => false,
                GetSignatureRequestsSignatureRequestIdDocumentsDocumentIdFields200Response::class => false,
                PostSignatureRequestsSignatureRequestIdDocumentsDocumentIdReplaceRequest::class => false,
                GetSignatureRequestsSignatureRequestIdFollowers200Response::class => false,
                PostSignatureRequestsSignatureRequestIdReactivateRequest::class => false,
                GetSignatureRequestsSignatureRequestIdSignersSignerIdDocuments200Response::class => false,
                GetTemplates200Response::class => false,
                GetUsers200Response::class => false,
                GetInvitations200Response::class => false,
                GetWorkspaces200Response::class => false,
                BankAccountVerificationExtractedFromDocument::class => false,
                ConsumptionAppQualifiedElectronicSignatureIdentificationModeIdentityVerification::class => false,
                ConsumptionAppQualifiedElectronicSignatureIdentificationMode::class => false,
                ConsumptionApp::class => false,
                ConsumptionApi::class => false,
                CustomExperienceRedirectUrls::class => false,
                CreateCustomExperienceRedirectUrls::class => false,
                UpdateCustomExperienceRedirectUrls::class => false,
                DocumentInitials::class => false,
                IdDocumentVerificationExtractedFromDocumentMrz::class => false,
                IdDocumentVerificationExtractedFromDocument::class => false,
                SignatureRequestInListReminderSettings::class => false,
                SignatureRequestInListSignersInner::class => false,
                SignatureRequestInListApproversInner::class => false,
                SignatureRequestInListDocumentsInner::class => false,
                SignatureRequestInListSender::class => false,
                CreateSignatureRequestReminderSettings::class => false,
                CreateSignatureRequestTemplatePlaceholders::class => false,
                SignatureRequestDeclineInformation::class => false,
                UpdateSignatureRequestReminderSettings::class => false,
                SignatureRequestActivatedDocumentsInner::class => false,
                ApproverInfo::class => false,
                SignerConsentRequestSettings::class => false,
                CreateSignerConsentRequestSettings::class => false,
                FieldRadioButtonGroupRadiosInner::class => false,
                Signature::class => false,
                Mention::class => false,
                Text::class => false,
                Checkbox::class => false,
                RadioGroupRadiosInner::class => false,
                RadioGroup::class => false,
                ReadOnlyText::class => false,
                Signature1::class => false,
                Mention1::class => false,
                Text1::class => false,
                Checkbox1::class => false,
                RadioGroup1RadiosInner::class => false,
                RadioGroup1::class => false,
                ReadOnlyText1::class => false,
                CreateFollowersInner::class => false,
                SignerInfo::class => false,
                SignerRedirectUrls::class => false,
                SignerCustomText::class => false,
                FromScratch1Info::class => false,
                FromScratch1RedirectUrls::class => false,
                FromScratch1CustomText::class => false,
                FromScratch1::class => false,
                FromExistingUser1::class => false,
                FromExistingContact1::class => false,
                UpdateSignerInfo::class => false,
                UserWorkspacesInner::class => false,
                WorkspaceUsersInner::class => false,
                SignatureRequestSignerFromInfoInputInfo::class => false,
                SignatureRequestSignerFromInfoInputRedirectUrls::class => false,
                SignatureRequestPlaceholderSignerSubstituteFromInfoInputInfo::class => false,
                Signature2::class => false,
                Mention2::class => false,
                Text2::class => false,
                Checkbox2::class => false,
                RadioGroup2RadiosInner::class => false,
                RadioGroup2::class => false,
                OtpMessage::class => false,
                Reference::class => false,
            ];
        }
    }
}
