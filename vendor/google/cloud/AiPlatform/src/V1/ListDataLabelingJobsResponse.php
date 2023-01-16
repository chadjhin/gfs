<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/aiplatform/v1/job_service.proto

namespace Google\Cloud\AIPlatform\V1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Response message for [JobService.ListDataLabelingJobs][google.cloud.aiplatform.v1.JobService.ListDataLabelingJobs].
 *
 * Generated from protobuf message <code>google.cloud.aiplatform.v1.ListDataLabelingJobsResponse</code>
 */
class ListDataLabelingJobsResponse extends \Google\Protobuf\Internal\Message
{
    /**
     * A list of DataLabelingJobs that matches the specified filter in the
     * request.
     *
     * Generated from protobuf field <code>repeated .google.cloud.aiplatform.v1.DataLabelingJob data_labeling_jobs = 1;</code>
     */
    private $data_labeling_jobs;
    /**
     * The standard List next-page token.
     *
     * Generated from protobuf field <code>string next_page_token = 2;</code>
     */
    private $next_page_token = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type \Google\Cloud\AIPlatform\V1\DataLabelingJob[]|\Google\Protobuf\Internal\RepeatedField $data_labeling_jobs
     *           A list of DataLabelingJobs that matches the specified filter in the
     *           request.
     *     @type string $next_page_token
     *           The standard List next-page token.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Aiplatform\V1\JobService::initOnce();
        parent::__construct($data);
    }

    /**
     * A list of DataLabelingJobs that matches the specified filter in the
     * request.
     *
     * Generated from protobuf field <code>repeated .google.cloud.aiplatform.v1.DataLabelingJob data_labeling_jobs = 1;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getDataLabelingJobs()
    {
        return $this->data_labeling_jobs;
    }

    /**
     * A list of DataLabelingJobs that matches the specified filter in the
     * request.
     *
     * Generated from protobuf field <code>repeated .google.cloud.aiplatform.v1.DataLabelingJob data_labeling_jobs = 1;</code>
     * @param \Google\Cloud\AIPlatform\V1\DataLabelingJob[]|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setDataLabelingJobs($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \Google\Cloud\AIPlatform\V1\DataLabelingJob::class);
        $this->data_labeling_jobs = $arr;

        return $this;
    }

    /**
     * The standard List next-page token.
     *
     * Generated from protobuf field <code>string next_page_token = 2;</code>
     * @return string
     */
    public function getNextPageToken()
    {
        return $this->next_page_token;
    }

    /**
     * The standard List next-page token.
     *
     * Generated from protobuf field <code>string next_page_token = 2;</code>
     * @param string $var
     * @return $this
     */
    public function setNextPageToken($var)
    {
        GPBUtil::checkString($var, True);
        $this->next_page_token = $var;

        return $this;
    }

}

