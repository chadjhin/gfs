<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/billing/budgets/v1/budget_model.proto

namespace Google\Cloud\Billing\Budgets\V1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * NotificationsRule defines notifications that are sent based on budget spend
 * and thresholds.
 *
 * Generated from protobuf message <code>google.cloud.billing.budgets.v1.NotificationsRule</code>
 */
class NotificationsRule extends \Google\Protobuf\Internal\Message
{
    /**
     * Optional. The name of the Pub/Sub topic where budget related messages will
     * be published, in the form `projects/{project_id}/topics/{topic_id}`.
     * Updates are sent at regular intervals to the topic. The topic needs to be
     * created before the budget is created; see
     * https://cloud.google.com/billing/docs/how-to/budgets#manage-notifications
     * for more details.
     * Caller is expected to have
     * `pubsub.topics.setIamPolicy` permission on the topic when it's set for a
     * budget, otherwise, the API call will fail with PERMISSION_DENIED. See
     * https://cloud.google.com/billing/docs/how-to/budgets-programmatic-notifications
     * for more details on Pub/Sub roles and permissions.
     *
     * Generated from protobuf field <code>string pubsub_topic = 1 [(.google.api.field_behavior) = OPTIONAL];</code>
     */
    private $pubsub_topic = '';
    /**
     * Optional. Required when
     * [NotificationsRule.pubsub_topic][google.cloud.billing.budgets.v1.NotificationsRule.pubsub_topic]
     * is set. The schema version of the notification sent to
     * [NotificationsRule.pubsub_topic][google.cloud.billing.budgets.v1.NotificationsRule.pubsub_topic].
     * Only "1.0" is accepted. It represents the JSON schema as defined in
     * https://cloud.google.com/billing/docs/how-to/budgets-programmatic-notifications#notification_format.
     *
     * Generated from protobuf field <code>string schema_version = 2 [(.google.api.field_behavior) = OPTIONAL];</code>
     */
    private $schema_version = '';
    /**
     * Optional. Targets to send notifications to when a threshold is exceeded.
     * This is in addition to default recipients who have billing account IAM
     * roles. The value is the full REST resource name of a monitoring
     * notification channel with the form
     * `projects/{project_id}/notificationChannels/{channel_id}`. A maximum of 5
     * channels are allowed. See
     * https://cloud.google.com/billing/docs/how-to/budgets-notification-recipients
     * for more details.
     *
     * Generated from protobuf field <code>repeated string monitoring_notification_channels = 3 [(.google.api.field_behavior) = OPTIONAL];</code>
     */
    private $monitoring_notification_channels;
    /**
     * Optional. When set to true, disables default notifications sent when a
     * threshold is exceeded. Default notifications are sent to those with Billing
     * Account Administrator and Billing Account User IAM roles for the target
     * account.
     *
     * Generated from protobuf field <code>bool disable_default_iam_recipients = 4 [(.google.api.field_behavior) = OPTIONAL];</code>
     */
    private $disable_default_iam_recipients = false;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $pubsub_topic
     *           Optional. The name of the Pub/Sub topic where budget related messages will
     *           be published, in the form `projects/{project_id}/topics/{topic_id}`.
     *           Updates are sent at regular intervals to the topic. The topic needs to be
     *           created before the budget is created; see
     *           https://cloud.google.com/billing/docs/how-to/budgets#manage-notifications
     *           for more details.
     *           Caller is expected to have
     *           `pubsub.topics.setIamPolicy` permission on the topic when it's set for a
     *           budget, otherwise, the API call will fail with PERMISSION_DENIED. See
     *           https://cloud.google.com/billing/docs/how-to/budgets-programmatic-notifications
     *           for more details on Pub/Sub roles and permissions.
     *     @type string $schema_version
     *           Optional. Required when
     *           [NotificationsRule.pubsub_topic][google.cloud.billing.budgets.v1.NotificationsRule.pubsub_topic]
     *           is set. The schema version of the notification sent to
     *           [NotificationsRule.pubsub_topic][google.cloud.billing.budgets.v1.NotificationsRule.pubsub_topic].
     *           Only "1.0" is accepted. It represents the JSON schema as defined in
     *           https://cloud.google.com/billing/docs/how-to/budgets-programmatic-notifications#notification_format.
     *     @type string[]|\Google\Protobuf\Internal\RepeatedField $monitoring_notification_channels
     *           Optional. Targets to send notifications to when a threshold is exceeded.
     *           This is in addition to default recipients who have billing account IAM
     *           roles. The value is the full REST resource name of a monitoring
     *           notification channel with the form
     *           `projects/{project_id}/notificationChannels/{channel_id}`. A maximum of 5
     *           channels are allowed. See
     *           https://cloud.google.com/billing/docs/how-to/budgets-notification-recipients
     *           for more details.
     *     @type bool $disable_default_iam_recipients
     *           Optional. When set to true, disables default notifications sent when a
     *           threshold is exceeded. Default notifications are sent to those with Billing
     *           Account Administrator and Billing Account User IAM roles for the target
     *           account.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Billing\Budgets\V1\BudgetModel::initOnce();
        parent::__construct($data);
    }

    /**
     * Optional. The name of the Pub/Sub topic where budget related messages will
     * be published, in the form `projects/{project_id}/topics/{topic_id}`.
     * Updates are sent at regular intervals to the topic. The topic needs to be
     * created before the budget is created; see
     * https://cloud.google.com/billing/docs/how-to/budgets#manage-notifications
     * for more details.
     * Caller is expected to have
     * `pubsub.topics.setIamPolicy` permission on the topic when it's set for a
     * budget, otherwise, the API call will fail with PERMISSION_DENIED. See
     * https://cloud.google.com/billing/docs/how-to/budgets-programmatic-notifications
     * for more details on Pub/Sub roles and permissions.
     *
     * Generated from protobuf field <code>string pubsub_topic = 1 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @return string
     */
    public function getPubsubTopic()
    {
        return $this->pubsub_topic;
    }

    /**
     * Optional. The name of the Pub/Sub topic where budget related messages will
     * be published, in the form `projects/{project_id}/topics/{topic_id}`.
     * Updates are sent at regular intervals to the topic. The topic needs to be
     * created before the budget is created; see
     * https://cloud.google.com/billing/docs/how-to/budgets#manage-notifications
     * for more details.
     * Caller is expected to have
     * `pubsub.topics.setIamPolicy` permission on the topic when it's set for a
     * budget, otherwise, the API call will fail with PERMISSION_DENIED. See
     * https://cloud.google.com/billing/docs/how-to/budgets-programmatic-notifications
     * for more details on Pub/Sub roles and permissions.
     *
     * Generated from protobuf field <code>string pubsub_topic = 1 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @param string $var
     * @return $this
     */
    public function setPubsubTopic($var)
    {
        GPBUtil::checkString($var, True);
        $this->pubsub_topic = $var;

        return $this;
    }

    /**
     * Optional. Required when
     * [NotificationsRule.pubsub_topic][google.cloud.billing.budgets.v1.NotificationsRule.pubsub_topic]
     * is set. The schema version of the notification sent to
     * [NotificationsRule.pubsub_topic][google.cloud.billing.budgets.v1.NotificationsRule.pubsub_topic].
     * Only "1.0" is accepted. It represents the JSON schema as defined in
     * https://cloud.google.com/billing/docs/how-to/budgets-programmatic-notifications#notification_format.
     *
     * Generated from protobuf field <code>string schema_version = 2 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @return string
     */
    public function getSchemaVersion()
    {
        return $this->schema_version;
    }

    /**
     * Optional. Required when
     * [NotificationsRule.pubsub_topic][google.cloud.billing.budgets.v1.NotificationsRule.pubsub_topic]
     * is set. The schema version of the notification sent to
     * [NotificationsRule.pubsub_topic][google.cloud.billing.budgets.v1.NotificationsRule.pubsub_topic].
     * Only "1.0" is accepted. It represents the JSON schema as defined in
     * https://cloud.google.com/billing/docs/how-to/budgets-programmatic-notifications#notification_format.
     *
     * Generated from protobuf field <code>string schema_version = 2 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @param string $var
     * @return $this
     */
    public function setSchemaVersion($var)
    {
        GPBUtil::checkString($var, True);
        $this->schema_version = $var;

        return $this;
    }

    /**
     * Optional. Targets to send notifications to when a threshold is exceeded.
     * This is in addition to default recipients who have billing account IAM
     * roles. The value is the full REST resource name of a monitoring
     * notification channel with the form
     * `projects/{project_id}/notificationChannels/{channel_id}`. A maximum of 5
     * channels are allowed. See
     * https://cloud.google.com/billing/docs/how-to/budgets-notification-recipients
     * for more details.
     *
     * Generated from protobuf field <code>repeated string monitoring_notification_channels = 3 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getMonitoringNotificationChannels()
    {
        return $this->monitoring_notification_channels;
    }

    /**
     * Optional. Targets to send notifications to when a threshold is exceeded.
     * This is in addition to default recipients who have billing account IAM
     * roles. The value is the full REST resource name of a monitoring
     * notification channel with the form
     * `projects/{project_id}/notificationChannels/{channel_id}`. A maximum of 5
     * channels are allowed. See
     * https://cloud.google.com/billing/docs/how-to/budgets-notification-recipients
     * for more details.
     *
     * Generated from protobuf field <code>repeated string monitoring_notification_channels = 3 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @param string[]|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setMonitoringNotificationChannels($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::STRING);
        $this->monitoring_notification_channels = $arr;

        return $this;
    }

    /**
     * Optional. When set to true, disables default notifications sent when a
     * threshold is exceeded. Default notifications are sent to those with Billing
     * Account Administrator and Billing Account User IAM roles for the target
     * account.
     *
     * Generated from protobuf field <code>bool disable_default_iam_recipients = 4 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @return bool
     */
    public function getDisableDefaultIamRecipients()
    {
        return $this->disable_default_iam_recipients;
    }

    /**
     * Optional. When set to true, disables default notifications sent when a
     * threshold is exceeded. Default notifications are sent to those with Billing
     * Account Administrator and Billing Account User IAM roles for the target
     * account.
     *
     * Generated from protobuf field <code>bool disable_default_iam_recipients = 4 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @param bool $var
     * @return $this
     */
    public function setDisableDefaultIamRecipients($var)
    {
        GPBUtil::checkBool($var);
        $this->disable_default_iam_recipients = $var;

        return $this;
    }

}

