<?php

namespace Qdequippe\Yousign\Api\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Qdequippe\Yousign\Api\Model\Approver;
use Qdequippe\Yousign\Api\Model\ApproverInfo;
use Qdequippe\Yousign\Api\Model\ApproverToNotify;
use Qdequippe\Yousign\Api\Model\Checkbox;
use Qdequippe\Yousign\Api\Model\Checkbox1;
use Qdequippe\Yousign\Api\Model\Checkbox2;
use Qdequippe\Yousign\Api\Model\Consumption;
use Qdequippe\Yousign\Api\Model\ConsumptionApi;
use Qdequippe\Yousign\Api\Model\ConsumptionApp;
use Qdequippe\Yousign\Api\Model\ConsumptionAppQualifiedElectronicSignatureIdentificationMode;
use Qdequippe\Yousign\Api\Model\ConsumptionAppQualifiedElectronicSignatureIdentificationModeIdentityVerification;
use Qdequippe\Yousign\Api\Model\Contact;
use Qdequippe\Yousign\Api\Model\CreateContact;
use Qdequippe\Yousign\Api\Model\CreateCustomExperience;
use Qdequippe\Yousign\Api\Model\CreateCustomExperienceRedirectUrls;
use Qdequippe\Yousign\Api\Model\CreateDocument;
use Qdequippe\Yousign\Api\Model\CreateElectronicSealFieldReadOnlyTextPayload;
use Qdequippe\Yousign\Api\Model\CreateElectronicSealFieldSealPayload;
use Qdequippe\Yousign\Api\Model\CreateElectronicSealPayload;
use Qdequippe\Yousign\Api\Model\CreateFieldFont;
use Qdequippe\Yousign\Api\Model\CreateFollowersInner;
use Qdequippe\Yousign\Api\Model\CreateSignatureRequest;
use Qdequippe\Yousign\Api\Model\CreateSignatureRequestMetadata;
use Qdequippe\Yousign\Api\Model\CreateSignatureRequestReminderSettings;
use Qdequippe\Yousign\Api\Model\CreateSignatureRequestTemplatePlaceholders;
use Qdequippe\Yousign\Api\Model\CreateSignerDocumentRequest;
use Qdequippe\Yousign\Api\Model\CreateWebhookSubscription;
use Qdequippe\Yousign\Api\Model\CustomExperience;
use Qdequippe\Yousign\Api\Model\CustomExperienceRedirectUrls;
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
use Qdequippe\Yousign\Api\Model\GetContacts200Response;
use Qdequippe\Yousign\Api\Model\GetCustomExperiences200Response;
use Qdequippe\Yousign\Api\Model\GetSignatureRequests200Response;
use Qdequippe\Yousign\Api\Model\GetSignatureRequests401Response;
use Qdequippe\Yousign\Api\Model\GetSignatureRequestsSignatureRequestIdDocumentsDocumentIdFields200Response;
use Qdequippe\Yousign\Api\Model\GetSignatureRequestsSignatureRequestIdFollowers200Response;
use Qdequippe\Yousign\Api\Model\GetSignatureRequestsSignatureRequestIdSignersSignerIdDocuments200Response;
use Qdequippe\Yousign\Api\Model\GetTemplates200Response;
use Qdequippe\Yousign\Api\Model\GetUsers200Response;
use Qdequippe\Yousign\Api\Model\GetWorkspaces200Response;
use Qdequippe\Yousign\Api\Model\InitialsArea;
use Qdequippe\Yousign\Api\Model\ListElectronicSealImages200Response;
use Qdequippe\Yousign\Api\Model\Mention;
use Qdequippe\Yousign\Api\Model\Mention1;
use Qdequippe\Yousign\Api\Model\Mention2;
use Qdequippe\Yousign\Api\Model\Metadata;
use Qdequippe\Yousign\Api\Model\Pagination;
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
use Qdequippe\Yousign\Api\Model\SignatureRequestSignerFromUserIdInput;
use Qdequippe\Yousign\Api\Model\Signer;
use Qdequippe\Yousign\Api\Model\SignerAuditTrail;
use Qdequippe\Yousign\Api\Model\SignerCustomText;
use Qdequippe\Yousign\Api\Model\SignerDocument;
use Qdequippe\Yousign\Api\Model\SignerDocumentRequest;
use Qdequippe\Yousign\Api\Model\SignerInfo;
use Qdequippe\Yousign\Api\Model\SignerRedirectUrls;
use Qdequippe\Yousign\Api\Model\SignerSign;
use Qdequippe\Yousign\Api\Model\Template;
use Qdequippe\Yousign\Api\Model\Text;
use Qdequippe\Yousign\Api\Model\Text1;
use Qdequippe\Yousign\Api\Model\Text2;
use Qdequippe\Yousign\Api\Model\UpdateContact;
use Qdequippe\Yousign\Api\Model\UpdateCustomExperience;
use Qdequippe\Yousign\Api\Model\UpdateDocument;
use Qdequippe\Yousign\Api\Model\UpdateFieldFont;
use Qdequippe\Yousign\Api\Model\UpdateSignatureRequest;
use Qdequippe\Yousign\Api\Model\UpdateSignatureRequestMetadata;
use Qdequippe\Yousign\Api\Model\UpdateSignatureRequestReminderSettings;
use Qdequippe\Yousign\Api\Model\UpdateSigner;
use Qdequippe\Yousign\Api\Model\UpdateSignerInfo;
use Qdequippe\Yousign\Api\Model\UpdateWebhookSubscription;
use Qdequippe\Yousign\Api\Model\UploadElectronicSealDocument;
use Qdequippe\Yousign\Api\Model\UploadElectronicSealImage;
use Qdequippe\Yousign\Api\Model\User;
use Qdequippe\Yousign\Api\Model\UserWorkspacesInner;
use Qdequippe\Yousign\Api\Model\ViolationResponse;
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
        protected $normalizers = [Pagination::class => PaginationNormalizer::class, SignatureRequestInList::class => SignatureRequestInListNormalizer::class, ViolationResponse::class => ViolationResponseNormalizer::class, CreateSignatureRequest::class => CreateSignatureRequestNormalizer::class, SignatureRequest::class => SignatureRequestNormalizer::class, UpdateSignatureRequest::class => UpdateSignatureRequestNormalizer::class, SignatureRequestActivated::class => SignatureRequestActivatedNormalizer::class, SignerAuditTrail::class => SignerAuditTrailNormalizer::class, Document::class => DocumentNormalizer::class, CreateDocument::class => CreateDocumentNormalizer::class, UpdateDocument::class => UpdateDocumentNormalizer::class, FieldSignature::class => FieldSignatureNormalizer::class, FieldText::class => FieldTextNormalizer::class, FieldMention::class => FieldMentionNormalizer::class, FieldCheckbox::class => FieldCheckboxNormalizer::class, FieldRadioButtonGroup::class => FieldRadioButtonGroupNormalizer::class, FieldReadOnlyText::class => FieldReadOnlyTextNormalizer::class, CreateSignerDocumentRequest::class => CreateSignerDocumentRequestNormalizer::class, SignerDocumentRequest::class => SignerDocumentRequestNormalizer::class, Signer::class => SignerNormalizer::class, UpdateSigner::class => UpdateSignerNormalizer::class, SignerSign::class => SignerSignNormalizer::class, SignerDocument::class => SignerDocumentNormalizer::class, Approver::class => ApproverNormalizer::class, Follower::class => FollowerNormalizer::class, Metadata::class => MetadataNormalizer::class, UpdateSignatureRequestMetadata::class => UpdateSignatureRequestMetadataNormalizer::class, CreateSignatureRequestMetadata::class => CreateSignatureRequestMetadataNormalizer::class, CustomExperience::class => CustomExperienceNormalizer::class, CreateCustomExperience::class => CreateCustomExperienceNormalizer::class, UpdateCustomExperience::class => UpdateCustomExperienceNormalizer::class, CreateElectronicSealPayload::class => CreateElectronicSealPayloadNormalizer::class, ElectronicSeal::class => ElectronicSealNormalizer::class, ElectronicSealAuditTrail::class => ElectronicSealAuditTrailNormalizer::class, UploadElectronicSealDocument::class => UploadElectronicSealDocumentNormalizer::class, ElectronicSealDocument::class => ElectronicSealDocumentNormalizer::class, ElectronicSealImage::class => ElectronicSealImageNormalizer::class, UploadElectronicSealImage::class => UploadElectronicSealImageNormalizer::class, WebhookSubscription::class => WebhookSubscriptionNormalizer::class, CreateWebhookSubscription::class => CreateWebhookSubscriptionNormalizer::class, UpdateWebhookSubscription::class => UpdateWebhookSubscriptionNormalizer::class, Contact::class => ContactNormalizer::class, CreateContact::class => CreateContactNormalizer::class, UpdateContact::class => UpdateContactNormalizer::class, Consumption::class => ConsumptionNormalizer::class, Workspace::class => WorkspaceNormalizer::class, User::class => UserNormalizer::class, Template::class => TemplateNormalizer::class, SignatureRequestSignerFromInfoInput::class => SignatureRequestSignerFromInfoInputNormalizer::class, SignatureRequestSignerFromUserIdInput::class => SignatureRequestSignerFromUserIdInputNormalizer::class, SignatureRequestSignerFromContactIdInput::class => SignatureRequestSignerFromContactIdInputNormalizer::class, SignatureRequestEmailNotification::class => SignatureRequestEmailNotificationNormalizer::class, SignatureRequestPlaceholderSignerSubstituteFromInfoInput::class => SignatureRequestPlaceholderSignerSubstituteFromInfoInputNormalizer::class, SignatureRequestPlaceholderSignerSubstituteFromUserIdInput::class => SignatureRequestPlaceholderSignerSubstituteFromUserIdInputNormalizer::class, SignatureRequestPlaceholderSignerSubstituteFromContactIdInput::class => SignatureRequestPlaceholderSignerSubstituteFromContactIdInputNormalizer::class, SignatureRequestPlaceholderReadOnlyTextFieldSubstituteInput::class => SignatureRequestPlaceholderReadOnlyTextFieldSubstituteInputNormalizer::class, EmbeddedSignerWithSignatureLink::class => EmbeddedSignerWithSignatureLinkNormalizer::class, ApproverToNotify::class => ApproverToNotifyNormalizer::class, InitialsArea::class => InitialsAreaNormalizer::class, Font::class => FontNormalizer::class, CreateFieldFont::class => CreateFieldFontNormalizer::class, UpdateFieldFont::class => UpdateFieldFontNormalizer::class, CreateElectronicSealFieldSealPayload::class => CreateElectronicSealFieldSealPayloadNormalizer::class, CreateElectronicSealFieldReadOnlyTextPayload::class => CreateElectronicSealFieldReadOnlyTextPayloadNormalizer::class, SignatureRequestEmailNotificationSender::class => SignatureRequestEmailNotificationSenderNormalizer::class, FontVariants::class => FontVariantsNormalizer::class, GetSignatureRequests200Response::class => GetSignatureRequests200ResponseNormalizer::class, GetSignatureRequests401Response::class => GetSignatureRequests401ResponseNormalizer::class, PostSignatureRequestsSignatureRequestIdCancelRequest::class => PostSignatureRequestsSignatureRequestIdCancelRequestNormalizer::class, PostSignatureRequestsSignatureRequestIdReactivateRequest::class => PostSignatureRequestsSignatureRequestIdReactivateRequestNormalizer::class, PostSignatureRequestsSignatureRequestIdDocumentsDocumentIdReplaceRequest::class => PostSignatureRequestsSignatureRequestIdDocumentsDocumentIdReplaceRequestNormalizer::class, GetSignatureRequestsSignatureRequestIdDocumentsDocumentIdFields200Response::class => GetSignatureRequestsSignatureRequestIdDocumentsDocumentIdFields200ResponseNormalizer::class, GetSignatureRequestsSignatureRequestIdSignersSignerIdDocuments200Response::class => GetSignatureRequestsSignatureRequestIdSignersSignerIdDocuments200ResponseNormalizer::class, FromScratchInfo::class => FromScratchInfoNormalizer::class, FromScratch::class => FromScratchNormalizer::class, FromExistingUser::class => FromExistingUserNormalizer::class, FromExistingContact::class => FromExistingContactNormalizer::class, FromExistingSigner::class => FromExistingSignerNormalizer::class, PatchSignatureRequestsSignatureRequestIdApproversApproverIdRequestInfo::class => PatchSignatureRequestsSignatureRequestIdApproversApproverIdRequestInfoNormalizer::class, PatchSignatureRequestsSignatureRequestIdApproversApproverIdRequest::class => PatchSignatureRequestsSignatureRequestIdApproversApproverIdRequestNormalizer::class, GetSignatureRequestsSignatureRequestIdFollowers200Response::class => GetSignatureRequestsSignatureRequestIdFollowers200ResponseNormalizer::class, GetCustomExperiences200Response::class => GetCustomExperiences200ResponseNormalizer::class, PatchCustomExperienceLogoRequest::class => PatchCustomExperienceLogoRequestNormalizer::class, ListElectronicSealImages200Response::class => ListElectronicSealImages200ResponseNormalizer::class, GetContacts200Response::class => GetContacts200ResponseNormalizer::class, GetWorkspaces200Response::class => GetWorkspaces200ResponseNormalizer::class, GetUsers200Response::class => GetUsers200ResponseNormalizer::class, GetTemplates200Response::class => GetTemplates200ResponseNormalizer::class, SignatureRequestInListReminderSettings::class => SignatureRequestInListReminderSettingsNormalizer::class, SignatureRequestInListSignersInner::class => SignatureRequestInListSignersInnerNormalizer::class, SignatureRequestInListApproversInner::class => SignatureRequestInListApproversInnerNormalizer::class, SignatureRequestInListDocumentsInner::class => SignatureRequestInListDocumentsInnerNormalizer::class, SignatureRequestInListSender::class => SignatureRequestInListSenderNormalizer::class, CreateSignatureRequestReminderSettings::class => CreateSignatureRequestReminderSettingsNormalizer::class, CreateSignatureRequestTemplatePlaceholders::class => CreateSignatureRequestTemplatePlaceholdersNormalizer::class, SignatureRequestDeclineInformation::class => SignatureRequestDeclineInformationNormalizer::class, UpdateSignatureRequestReminderSettings::class => UpdateSignatureRequestReminderSettingsNormalizer::class, SignatureRequestActivatedDocumentsInner::class => SignatureRequestActivatedDocumentsInnerNormalizer::class, DocumentInitials::class => DocumentInitialsNormalizer::class, FieldRadioButtonGroupRadiosInner::class => FieldRadioButtonGroupRadiosInnerNormalizer::class, Signature::class => SignatureNormalizer::class, Mention::class => MentionNormalizer::class, Text::class => TextNormalizer::class, Checkbox::class => CheckboxNormalizer::class, RadioGroupRadiosInner::class => RadioGroupRadiosInnerNormalizer::class, RadioGroup::class => RadioGroupNormalizer::class, ReadOnlyText::class => ReadOnlyTextNormalizer::class, Signature1::class => Signature1Normalizer::class, Mention1::class => Mention1Normalizer::class, Text1::class => Text1Normalizer::class, Checkbox1::class => Checkbox1Normalizer::class, RadioGroup1RadiosInner::class => RadioGroup1RadiosInnerNormalizer::class, RadioGroup1::class => RadioGroup1Normalizer::class, ReadOnlyText1::class => ReadOnlyText1Normalizer::class, SignerInfo::class => SignerInfoNormalizer::class, SignerRedirectUrls::class => SignerRedirectUrlsNormalizer::class, SignerCustomText::class => SignerCustomTextNormalizer::class, FromScratch1Info::class => FromScratch1InfoNormalizer::class, FromScratch1RedirectUrls::class => FromScratch1RedirectUrlsNormalizer::class, FromScratch1CustomText::class => FromScratch1CustomTextNormalizer::class, FromScratch1::class => FromScratch1Normalizer::class, FromExistingUser1::class => FromExistingUser1Normalizer::class, FromExistingContact1::class => FromExistingContact1Normalizer::class, UpdateSignerInfo::class => UpdateSignerInfoNormalizer::class, ApproverInfo::class => ApproverInfoNormalizer::class, CreateFollowersInner::class => CreateFollowersInnerNormalizer::class, CustomExperienceRedirectUrls::class => CustomExperienceRedirectUrlsNormalizer::class, CreateCustomExperienceRedirectUrls::class => CreateCustomExperienceRedirectUrlsNormalizer::class, ConsumptionAppQualifiedElectronicSignatureIdentificationModeIdentityVerification::class => ConsumptionAppQualifiedElectronicSignatureIdentificationModeIdentityVerificationNormalizer::class, ConsumptionAppQualifiedElectronicSignatureIdentificationMode::class => ConsumptionAppQualifiedElectronicSignatureIdentificationModeNormalizer::class, ConsumptionApp::class => ConsumptionAppNormalizer::class, ConsumptionApi::class => ConsumptionApiNormalizer::class, WorkspaceUsersInner::class => WorkspaceUsersInnerNormalizer::class, UserWorkspacesInner::class => UserWorkspacesInnerNormalizer::class, SignatureRequestSignerFromInfoInputInfo::class => SignatureRequestSignerFromInfoInputInfoNormalizer::class, SignatureRequestPlaceholderSignerSubstituteFromInfoInputInfo::class => SignatureRequestPlaceholderSignerSubstituteFromInfoInputInfoNormalizer::class, Signature2::class => Signature2Normalizer::class, Mention2::class => Mention2Normalizer::class, Text2::class => Text2Normalizer::class, Checkbox2::class => Checkbox2Normalizer::class, RadioGroup2RadiosInner::class => RadioGroup2RadiosInnerNormalizer::class, RadioGroup2::class => RadioGroup2Normalizer::class, Reference::class => ReferenceNormalizer::class];
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
            return [Pagination::class => false, SignatureRequestInList::class => false, ViolationResponse::class => false, CreateSignatureRequest::class => false, SignatureRequest::class => false, UpdateSignatureRequest::class => false, SignatureRequestActivated::class => false, SignerAuditTrail::class => false, Document::class => false, CreateDocument::class => false, UpdateDocument::class => false, FieldSignature::class => false, FieldText::class => false, FieldMention::class => false, FieldCheckbox::class => false, FieldRadioButtonGroup::class => false, FieldReadOnlyText::class => false, CreateSignerDocumentRequest::class => false, SignerDocumentRequest::class => false, Signer::class => false, UpdateSigner::class => false, SignerSign::class => false, SignerDocument::class => false, Approver::class => false, Follower::class => false, Metadata::class => false, UpdateSignatureRequestMetadata::class => false, CreateSignatureRequestMetadata::class => false, CustomExperience::class => false, CreateCustomExperience::class => false, UpdateCustomExperience::class => false, CreateElectronicSealPayload::class => false, ElectronicSeal::class => false, ElectronicSealAuditTrail::class => false, UploadElectronicSealDocument::class => false, ElectronicSealDocument::class => false, ElectronicSealImage::class => false, UploadElectronicSealImage::class => false, WebhookSubscription::class => false, CreateWebhookSubscription::class => false, UpdateWebhookSubscription::class => false, Contact::class => false, CreateContact::class => false, UpdateContact::class => false, Consumption::class => false, Workspace::class => false, User::class => false, Template::class => false, SignatureRequestSignerFromInfoInput::class => false, SignatureRequestSignerFromUserIdInput::class => false, SignatureRequestSignerFromContactIdInput::class => false, SignatureRequestEmailNotification::class => false, SignatureRequestPlaceholderSignerSubstituteFromInfoInput::class => false, SignatureRequestPlaceholderSignerSubstituteFromUserIdInput::class => false, SignatureRequestPlaceholderSignerSubstituteFromContactIdInput::class => false, SignatureRequestPlaceholderReadOnlyTextFieldSubstituteInput::class => false, EmbeddedSignerWithSignatureLink::class => false, ApproverToNotify::class => false, InitialsArea::class => false, Font::class => false, CreateFieldFont::class => false, UpdateFieldFont::class => false, CreateElectronicSealFieldSealPayload::class => false, CreateElectronicSealFieldReadOnlyTextPayload::class => false, SignatureRequestEmailNotificationSender::class => false, FontVariants::class => false, GetSignatureRequests200Response::class => false, GetSignatureRequests401Response::class => false, PostSignatureRequestsSignatureRequestIdCancelRequest::class => false, PostSignatureRequestsSignatureRequestIdReactivateRequest::class => false, PostSignatureRequestsSignatureRequestIdDocumentsDocumentIdReplaceRequest::class => false, GetSignatureRequestsSignatureRequestIdDocumentsDocumentIdFields200Response::class => false, GetSignatureRequestsSignatureRequestIdSignersSignerIdDocuments200Response::class => false, FromScratchInfo::class => false, FromScratch::class => false, FromExistingUser::class => false, FromExistingContact::class => false, FromExistingSigner::class => false, PatchSignatureRequestsSignatureRequestIdApproversApproverIdRequestInfo::class => false, PatchSignatureRequestsSignatureRequestIdApproversApproverIdRequest::class => false, GetSignatureRequestsSignatureRequestIdFollowers200Response::class => false, GetCustomExperiences200Response::class => false, PatchCustomExperienceLogoRequest::class => false, ListElectronicSealImages200Response::class => false, GetContacts200Response::class => false, GetWorkspaces200Response::class => false, GetUsers200Response::class => false, GetTemplates200Response::class => false, SignatureRequestInListReminderSettings::class => false, SignatureRequestInListSignersInner::class => false, SignatureRequestInListApproversInner::class => false, SignatureRequestInListDocumentsInner::class => false, SignatureRequestInListSender::class => false, CreateSignatureRequestReminderSettings::class => false, CreateSignatureRequestTemplatePlaceholders::class => false, SignatureRequestDeclineInformation::class => false, UpdateSignatureRequestReminderSettings::class => false, SignatureRequestActivatedDocumentsInner::class => false, DocumentInitials::class => false, FieldRadioButtonGroupRadiosInner::class => false, Signature::class => false, Mention::class => false, Text::class => false, Checkbox::class => false, RadioGroupRadiosInner::class => false, RadioGroup::class => false, ReadOnlyText::class => false, Signature1::class => false, Mention1::class => false, Text1::class => false, Checkbox1::class => false, RadioGroup1RadiosInner::class => false, RadioGroup1::class => false, ReadOnlyText1::class => false, SignerInfo::class => false, SignerRedirectUrls::class => false, SignerCustomText::class => false, FromScratch1Info::class => false, FromScratch1RedirectUrls::class => false, FromScratch1CustomText::class => false, FromScratch1::class => false, FromExistingUser1::class => false, FromExistingContact1::class => false, UpdateSignerInfo::class => false, ApproverInfo::class => false, CreateFollowersInner::class => false, CustomExperienceRedirectUrls::class => false, CreateCustomExperienceRedirectUrls::class => false, ConsumptionAppQualifiedElectronicSignatureIdentificationModeIdentityVerification::class => false, ConsumptionAppQualifiedElectronicSignatureIdentificationMode::class => false, ConsumptionApp::class => false, ConsumptionApi::class => false, WorkspaceUsersInner::class => false, UserWorkspacesInner::class => false, SignatureRequestSignerFromInfoInputInfo::class => false, SignatureRequestPlaceholderSignerSubstituteFromInfoInputInfo::class => false, Signature2::class => false, Mention2::class => false, Text2::class => false, Checkbox2::class => false, RadioGroup2RadiosInner::class => false, RadioGroup2::class => false, Reference::class => false];
        }
    }
} else {
    class JaneObjectNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use CheckArray;
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use ValidatorTrait;
        protected $normalizers = [Pagination::class => PaginationNormalizer::class, SignatureRequestInList::class => SignatureRequestInListNormalizer::class, ViolationResponse::class => ViolationResponseNormalizer::class, CreateSignatureRequest::class => CreateSignatureRequestNormalizer::class, SignatureRequest::class => SignatureRequestNormalizer::class, UpdateSignatureRequest::class => UpdateSignatureRequestNormalizer::class, SignatureRequestActivated::class => SignatureRequestActivatedNormalizer::class, SignerAuditTrail::class => SignerAuditTrailNormalizer::class, Document::class => DocumentNormalizer::class, CreateDocument::class => CreateDocumentNormalizer::class, UpdateDocument::class => UpdateDocumentNormalizer::class, FieldSignature::class => FieldSignatureNormalizer::class, FieldText::class => FieldTextNormalizer::class, FieldMention::class => FieldMentionNormalizer::class, FieldCheckbox::class => FieldCheckboxNormalizer::class, FieldRadioButtonGroup::class => FieldRadioButtonGroupNormalizer::class, FieldReadOnlyText::class => FieldReadOnlyTextNormalizer::class, CreateSignerDocumentRequest::class => CreateSignerDocumentRequestNormalizer::class, SignerDocumentRequest::class => SignerDocumentRequestNormalizer::class, Signer::class => SignerNormalizer::class, UpdateSigner::class => UpdateSignerNormalizer::class, SignerSign::class => SignerSignNormalizer::class, SignerDocument::class => SignerDocumentNormalizer::class, Approver::class => ApproverNormalizer::class, Follower::class => FollowerNormalizer::class, Metadata::class => MetadataNormalizer::class, UpdateSignatureRequestMetadata::class => UpdateSignatureRequestMetadataNormalizer::class, CreateSignatureRequestMetadata::class => CreateSignatureRequestMetadataNormalizer::class, CustomExperience::class => CustomExperienceNormalizer::class, CreateCustomExperience::class => CreateCustomExperienceNormalizer::class, UpdateCustomExperience::class => UpdateCustomExperienceNormalizer::class, CreateElectronicSealPayload::class => CreateElectronicSealPayloadNormalizer::class, ElectronicSeal::class => ElectronicSealNormalizer::class, ElectronicSealAuditTrail::class => ElectronicSealAuditTrailNormalizer::class, UploadElectronicSealDocument::class => UploadElectronicSealDocumentNormalizer::class, ElectronicSealDocument::class => ElectronicSealDocumentNormalizer::class, ElectronicSealImage::class => ElectronicSealImageNormalizer::class, UploadElectronicSealImage::class => UploadElectronicSealImageNormalizer::class, WebhookSubscription::class => WebhookSubscriptionNormalizer::class, CreateWebhookSubscription::class => CreateWebhookSubscriptionNormalizer::class, UpdateWebhookSubscription::class => UpdateWebhookSubscriptionNormalizer::class, Contact::class => ContactNormalizer::class, CreateContact::class => CreateContactNormalizer::class, UpdateContact::class => UpdateContactNormalizer::class, Consumption::class => ConsumptionNormalizer::class, Workspace::class => WorkspaceNormalizer::class, User::class => UserNormalizer::class, Template::class => TemplateNormalizer::class, SignatureRequestSignerFromInfoInput::class => SignatureRequestSignerFromInfoInputNormalizer::class, SignatureRequestSignerFromUserIdInput::class => SignatureRequestSignerFromUserIdInputNormalizer::class, SignatureRequestSignerFromContactIdInput::class => SignatureRequestSignerFromContactIdInputNormalizer::class, SignatureRequestEmailNotification::class => SignatureRequestEmailNotificationNormalizer::class, SignatureRequestPlaceholderSignerSubstituteFromInfoInput::class => SignatureRequestPlaceholderSignerSubstituteFromInfoInputNormalizer::class, SignatureRequestPlaceholderSignerSubstituteFromUserIdInput::class => SignatureRequestPlaceholderSignerSubstituteFromUserIdInputNormalizer::class, SignatureRequestPlaceholderSignerSubstituteFromContactIdInput::class => SignatureRequestPlaceholderSignerSubstituteFromContactIdInputNormalizer::class, SignatureRequestPlaceholderReadOnlyTextFieldSubstituteInput::class => SignatureRequestPlaceholderReadOnlyTextFieldSubstituteInputNormalizer::class, EmbeddedSignerWithSignatureLink::class => EmbeddedSignerWithSignatureLinkNormalizer::class, ApproverToNotify::class => ApproverToNotifyNormalizer::class, InitialsArea::class => InitialsAreaNormalizer::class, Font::class => FontNormalizer::class, CreateFieldFont::class => CreateFieldFontNormalizer::class, UpdateFieldFont::class => UpdateFieldFontNormalizer::class, CreateElectronicSealFieldSealPayload::class => CreateElectronicSealFieldSealPayloadNormalizer::class, CreateElectronicSealFieldReadOnlyTextPayload::class => CreateElectronicSealFieldReadOnlyTextPayloadNormalizer::class, SignatureRequestEmailNotificationSender::class => SignatureRequestEmailNotificationSenderNormalizer::class, FontVariants::class => FontVariantsNormalizer::class, GetSignatureRequests200Response::class => GetSignatureRequests200ResponseNormalizer::class, GetSignatureRequests401Response::class => GetSignatureRequests401ResponseNormalizer::class, PostSignatureRequestsSignatureRequestIdCancelRequest::class => PostSignatureRequestsSignatureRequestIdCancelRequestNormalizer::class, PostSignatureRequestsSignatureRequestIdReactivateRequest::class => PostSignatureRequestsSignatureRequestIdReactivateRequestNormalizer::class, PostSignatureRequestsSignatureRequestIdDocumentsDocumentIdReplaceRequest::class => PostSignatureRequestsSignatureRequestIdDocumentsDocumentIdReplaceRequestNormalizer::class, GetSignatureRequestsSignatureRequestIdDocumentsDocumentIdFields200Response::class => GetSignatureRequestsSignatureRequestIdDocumentsDocumentIdFields200ResponseNormalizer::class, GetSignatureRequestsSignatureRequestIdSignersSignerIdDocuments200Response::class => GetSignatureRequestsSignatureRequestIdSignersSignerIdDocuments200ResponseNormalizer::class, FromScratchInfo::class => FromScratchInfoNormalizer::class, FromScratch::class => FromScratchNormalizer::class, FromExistingUser::class => FromExistingUserNormalizer::class, FromExistingContact::class => FromExistingContactNormalizer::class, FromExistingSigner::class => FromExistingSignerNormalizer::class, PatchSignatureRequestsSignatureRequestIdApproversApproverIdRequestInfo::class => PatchSignatureRequestsSignatureRequestIdApproversApproverIdRequestInfoNormalizer::class, PatchSignatureRequestsSignatureRequestIdApproversApproverIdRequest::class => PatchSignatureRequestsSignatureRequestIdApproversApproverIdRequestNormalizer::class, GetSignatureRequestsSignatureRequestIdFollowers200Response::class => GetSignatureRequestsSignatureRequestIdFollowers200ResponseNormalizer::class, GetCustomExperiences200Response::class => GetCustomExperiences200ResponseNormalizer::class, PatchCustomExperienceLogoRequest::class => PatchCustomExperienceLogoRequestNormalizer::class, ListElectronicSealImages200Response::class => ListElectronicSealImages200ResponseNormalizer::class, GetContacts200Response::class => GetContacts200ResponseNormalizer::class, GetWorkspaces200Response::class => GetWorkspaces200ResponseNormalizer::class, GetUsers200Response::class => GetUsers200ResponseNormalizer::class, GetTemplates200Response::class => GetTemplates200ResponseNormalizer::class, SignatureRequestInListReminderSettings::class => SignatureRequestInListReminderSettingsNormalizer::class, SignatureRequestInListSignersInner::class => SignatureRequestInListSignersInnerNormalizer::class, SignatureRequestInListApproversInner::class => SignatureRequestInListApproversInnerNormalizer::class, SignatureRequestInListDocumentsInner::class => SignatureRequestInListDocumentsInnerNormalizer::class, SignatureRequestInListSender::class => SignatureRequestInListSenderNormalizer::class, CreateSignatureRequestReminderSettings::class => CreateSignatureRequestReminderSettingsNormalizer::class, CreateSignatureRequestTemplatePlaceholders::class => CreateSignatureRequestTemplatePlaceholdersNormalizer::class, SignatureRequestDeclineInformation::class => SignatureRequestDeclineInformationNormalizer::class, UpdateSignatureRequestReminderSettings::class => UpdateSignatureRequestReminderSettingsNormalizer::class, SignatureRequestActivatedDocumentsInner::class => SignatureRequestActivatedDocumentsInnerNormalizer::class, DocumentInitials::class => DocumentInitialsNormalizer::class, FieldRadioButtonGroupRadiosInner::class => FieldRadioButtonGroupRadiosInnerNormalizer::class, Signature::class => SignatureNormalizer::class, Mention::class => MentionNormalizer::class, Text::class => TextNormalizer::class, Checkbox::class => CheckboxNormalizer::class, RadioGroupRadiosInner::class => RadioGroupRadiosInnerNormalizer::class, RadioGroup::class => RadioGroupNormalizer::class, ReadOnlyText::class => ReadOnlyTextNormalizer::class, Signature1::class => Signature1Normalizer::class, Mention1::class => Mention1Normalizer::class, Text1::class => Text1Normalizer::class, Checkbox1::class => Checkbox1Normalizer::class, RadioGroup1RadiosInner::class => RadioGroup1RadiosInnerNormalizer::class, RadioGroup1::class => RadioGroup1Normalizer::class, ReadOnlyText1::class => ReadOnlyText1Normalizer::class, SignerInfo::class => SignerInfoNormalizer::class, SignerRedirectUrls::class => SignerRedirectUrlsNormalizer::class, SignerCustomText::class => SignerCustomTextNormalizer::class, FromScratch1Info::class => FromScratch1InfoNormalizer::class, FromScratch1RedirectUrls::class => FromScratch1RedirectUrlsNormalizer::class, FromScratch1CustomText::class => FromScratch1CustomTextNormalizer::class, FromScratch1::class => FromScratch1Normalizer::class, FromExistingUser1::class => FromExistingUser1Normalizer::class, FromExistingContact1::class => FromExistingContact1Normalizer::class, UpdateSignerInfo::class => UpdateSignerInfoNormalizer::class, ApproverInfo::class => ApproverInfoNormalizer::class, CreateFollowersInner::class => CreateFollowersInnerNormalizer::class, CustomExperienceRedirectUrls::class => CustomExperienceRedirectUrlsNormalizer::class, CreateCustomExperienceRedirectUrls::class => CreateCustomExperienceRedirectUrlsNormalizer::class, ConsumptionAppQualifiedElectronicSignatureIdentificationModeIdentityVerification::class => ConsumptionAppQualifiedElectronicSignatureIdentificationModeIdentityVerificationNormalizer::class, ConsumptionAppQualifiedElectronicSignatureIdentificationMode::class => ConsumptionAppQualifiedElectronicSignatureIdentificationModeNormalizer::class, ConsumptionApp::class => ConsumptionAppNormalizer::class, ConsumptionApi::class => ConsumptionApiNormalizer::class, WorkspaceUsersInner::class => WorkspaceUsersInnerNormalizer::class, UserWorkspacesInner::class => UserWorkspacesInnerNormalizer::class, SignatureRequestSignerFromInfoInputInfo::class => SignatureRequestSignerFromInfoInputInfoNormalizer::class, SignatureRequestPlaceholderSignerSubstituteFromInfoInputInfo::class => SignatureRequestPlaceholderSignerSubstituteFromInfoInputInfoNormalizer::class, Signature2::class => Signature2Normalizer::class, Mention2::class => Mention2Normalizer::class, Text2::class => Text2Normalizer::class, Checkbox2::class => Checkbox2Normalizer::class, RadioGroup2RadiosInner::class => RadioGroup2RadiosInnerNormalizer::class, RadioGroup2::class => RadioGroup2Normalizer::class, Reference::class => ReferenceNormalizer::class];
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
         *
         * @return array|string|int|float|bool|\ArrayObject|null
         */
        public function normalize($object, $format = null, array $context = [])
        {
            $normalizerClass = $this->normalizers[$object::class];
            $normalizer = $this->getNormalizer($normalizerClass);

            return $normalizer->normalize($object, $format, $context);
        }

        /**
         * @param mixed|null $format
         */
        public function denormalize($data, $type, $format = null, array $context = [])
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
            return [Pagination::class => false, SignatureRequestInList::class => false, ViolationResponse::class => false, CreateSignatureRequest::class => false, SignatureRequest::class => false, UpdateSignatureRequest::class => false, SignatureRequestActivated::class => false, SignerAuditTrail::class => false, Document::class => false, CreateDocument::class => false, UpdateDocument::class => false, FieldSignature::class => false, FieldText::class => false, FieldMention::class => false, FieldCheckbox::class => false, FieldRadioButtonGroup::class => false, FieldReadOnlyText::class => false, CreateSignerDocumentRequest::class => false, SignerDocumentRequest::class => false, Signer::class => false, UpdateSigner::class => false, SignerSign::class => false, SignerDocument::class => false, Approver::class => false, Follower::class => false, Metadata::class => false, UpdateSignatureRequestMetadata::class => false, CreateSignatureRequestMetadata::class => false, CustomExperience::class => false, CreateCustomExperience::class => false, UpdateCustomExperience::class => false, CreateElectronicSealPayload::class => false, ElectronicSeal::class => false, ElectronicSealAuditTrail::class => false, UploadElectronicSealDocument::class => false, ElectronicSealDocument::class => false, ElectronicSealImage::class => false, UploadElectronicSealImage::class => false, WebhookSubscription::class => false, CreateWebhookSubscription::class => false, UpdateWebhookSubscription::class => false, Contact::class => false, CreateContact::class => false, UpdateContact::class => false, Consumption::class => false, Workspace::class => false, User::class => false, Template::class => false, SignatureRequestSignerFromInfoInput::class => false, SignatureRequestSignerFromUserIdInput::class => false, SignatureRequestSignerFromContactIdInput::class => false, SignatureRequestEmailNotification::class => false, SignatureRequestPlaceholderSignerSubstituteFromInfoInput::class => false, SignatureRequestPlaceholderSignerSubstituteFromUserIdInput::class => false, SignatureRequestPlaceholderSignerSubstituteFromContactIdInput::class => false, SignatureRequestPlaceholderReadOnlyTextFieldSubstituteInput::class => false, EmbeddedSignerWithSignatureLink::class => false, ApproverToNotify::class => false, InitialsArea::class => false, Font::class => false, CreateFieldFont::class => false, UpdateFieldFont::class => false, CreateElectronicSealFieldSealPayload::class => false, CreateElectronicSealFieldReadOnlyTextPayload::class => false, SignatureRequestEmailNotificationSender::class => false, FontVariants::class => false, GetSignatureRequests200Response::class => false, GetSignatureRequests401Response::class => false, PostSignatureRequestsSignatureRequestIdCancelRequest::class => false, PostSignatureRequestsSignatureRequestIdReactivateRequest::class => false, PostSignatureRequestsSignatureRequestIdDocumentsDocumentIdReplaceRequest::class => false, GetSignatureRequestsSignatureRequestIdDocumentsDocumentIdFields200Response::class => false, GetSignatureRequestsSignatureRequestIdSignersSignerIdDocuments200Response::class => false, FromScratchInfo::class => false, FromScratch::class => false, FromExistingUser::class => false, FromExistingContact::class => false, FromExistingSigner::class => false, PatchSignatureRequestsSignatureRequestIdApproversApproverIdRequestInfo::class => false, PatchSignatureRequestsSignatureRequestIdApproversApproverIdRequest::class => false, GetSignatureRequestsSignatureRequestIdFollowers200Response::class => false, GetCustomExperiences200Response::class => false, PatchCustomExperienceLogoRequest::class => false, ListElectronicSealImages200Response::class => false, GetContacts200Response::class => false, GetWorkspaces200Response::class => false, GetUsers200Response::class => false, GetTemplates200Response::class => false, SignatureRequestInListReminderSettings::class => false, SignatureRequestInListSignersInner::class => false, SignatureRequestInListApproversInner::class => false, SignatureRequestInListDocumentsInner::class => false, SignatureRequestInListSender::class => false, CreateSignatureRequestReminderSettings::class => false, CreateSignatureRequestTemplatePlaceholders::class => false, SignatureRequestDeclineInformation::class => false, UpdateSignatureRequestReminderSettings::class => false, SignatureRequestActivatedDocumentsInner::class => false, DocumentInitials::class => false, FieldRadioButtonGroupRadiosInner::class => false, Signature::class => false, Mention::class => false, Text::class => false, Checkbox::class => false, RadioGroupRadiosInner::class => false, RadioGroup::class => false, ReadOnlyText::class => false, Signature1::class => false, Mention1::class => false, Text1::class => false, Checkbox1::class => false, RadioGroup1RadiosInner::class => false, RadioGroup1::class => false, ReadOnlyText1::class => false, SignerInfo::class => false, SignerRedirectUrls::class => false, SignerCustomText::class => false, FromScratch1Info::class => false, FromScratch1RedirectUrls::class => false, FromScratch1CustomText::class => false, FromScratch1::class => false, FromExistingUser1::class => false, FromExistingContact1::class => false, UpdateSignerInfo::class => false, ApproverInfo::class => false, CreateFollowersInner::class => false, CustomExperienceRedirectUrls::class => false, CreateCustomExperienceRedirectUrls::class => false, ConsumptionAppQualifiedElectronicSignatureIdentificationModeIdentityVerification::class => false, ConsumptionAppQualifiedElectronicSignatureIdentificationMode::class => false, ConsumptionApp::class => false, ConsumptionApi::class => false, WorkspaceUsersInner::class => false, UserWorkspacesInner::class => false, SignatureRequestSignerFromInfoInputInfo::class => false, SignatureRequestPlaceholderSignerSubstituteFromInfoInputInfo::class => false, Signature2::class => false, Mention2::class => false, Text2::class => false, Checkbox2::class => false, RadioGroup2RadiosInner::class => false, RadioGroup2::class => false, Reference::class => false];
        }
    }
}
