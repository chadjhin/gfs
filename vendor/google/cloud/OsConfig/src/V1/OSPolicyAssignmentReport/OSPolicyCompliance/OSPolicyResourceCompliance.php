<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/osconfig/v1/os_policy_assignment_reports.proto

namespace Google\Cloud\OsConfig\V1\OSPolicyAssignmentReport\OSPolicyCompliance;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Compliance data for an OS policy resource.
 *
 * Generated from protobuf message <code>google.cloud.osconfig.v1.OSPolicyAssignmentReport.OSPolicyCompliance.OSPolicyResourceCompliance</code>
 */
class OSPolicyResourceCompliance extends \Google\Protobuf\Internal\Message
{
    /**
     * The ID of the OS policy resource.
     *
     * Generated from protobuf field <code>string os_policy_resource_id = 1;</code>
     */
    private $os_policy_resource_id = '';
    /**
     * Ordered list of configuration completed by the agent for the OS policy
     * resource.
     *
     * Generated from protobuf field <code>repeated .google.cloud.osconfig.v1.OSPolicyAssignmentReport.OSPolicyCompliance.OSPolicyResourceCompliance.OSPolicyResourceConfigStep config_steps = 2;</code>
     */
    private $config_steps;
    /**
     * The compliance state of the resource.
     *
     * Generated from protobuf field <code>.google.cloud.osconfig.v1.OSPolicyAssignmentReport.OSPolicyCompliance.OSPolicyResourceCompliance.ComplianceState compliance_state = 3;</code>
     */
    private $compliance_state = 0;
    /**
     * A reason for the resource to be in the given compliance state.
     * This field is always populated when `compliance_state` is `UNKNOWN`.
     * The following values are supported when `compliance_state == UNKNOWN`
     * * `execution-errors`: Errors were encountered by the agent while
     * executing the resource and the compliance state couldn't be
     * determined.
     * * `execution-skipped-by-agent`: Resource execution was skipped by the
     * agent because errors were encountered while executing prior resources
     * in the OS policy.
     * * `os-policy-execution-attempt-failed`: The execution of the OS policy
     * containing this resource failed and the compliance state couldn't be
     * determined.
     *
     * Generated from protobuf field <code>string compliance_state_reason = 4;</code>
     */
    private $compliance_state_reason = '';
    protected $output;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $os_policy_resource_id
     *           The ID of the OS policy resource.
     *     @type \Google\Cloud\OsConfig\V1\OSPolicyAssignmentReport\OSPolicyCompliance\OSPolicyResourceCompliance\OSPolicyResourceConfigStep[]|\Google\Protobuf\Internal\RepeatedField $config_steps
     *           Ordered list of configuration completed by the agent for the OS policy
     *           resource.
     *     @type int $compliance_state
     *           The compliance state of the resource.
     *     @type string $compliance_state_reason
     *           A reason for the resource to be in the given compliance state.
     *           This field is always populated when `compliance_state` is `UNKNOWN`.
     *           The following values are supported when `compliance_state == UNKNOWN`
     *           * `execution-errors`: Errors were encountered by the agent while
     *           executing the resource and the compliance state couldn't be
     *           determined.
     *           * `execution-skipped-by-agent`: Resource execution was skipped by the
     *           agent because errors were encountered while executing prior resources
     *           in the OS policy.
     *           * `os-policy-execution-attempt-failed`: The execution of the OS policy
     *           containing this resource failed and the compliance state couldn't be
     *           determined.
     *     @type \Google\Cloud\OsConfig\V1\OSPolicyAssignmentReport\OSPolicyCompliance\OSPolicyResourceCompliance\ExecResourceOutput $exec_resource_output
     *           ExecResource specific output.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Osconfig\V1\OsPolicyAssignmentReports::initOnce();
        parent::__construct($data);
    }

    /**
     * The ID of the OS policy resource.
     *
     * Generated from protobuf field <code>string os_policy_resource_id = 1;</code>
     * @return string
     */
    public function getOsPolicyResourceId()
    {
        return $this->os_policy_resource_id;
    }

    /**
     * The ID of the OS policy resource.
     *
     * Generated from protobuf field <code>string os_policy_resource_id = 1;</code>
     * @param string $var
     * @return $this
     */
    public function setOsPolicyResourceId($var)
    {
        GPBUtil::checkString($var, True);
        $this->os_policy_resource_id = $var;

        return $this;
    }

    /**
     * Ordered list of configuration completed by the agent for the OS policy
     * resource.
     *
     * Generated from protobuf field <code>repeated .google.cloud.osconfig.v1.OSPolicyAssignmentReport.OSPolicyCompliance.OSPolicyResourceCompliance.OSPolicyResourceConfigStep config_steps = 2;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getConfigSteps()
    {
        return $this->config_steps;
    }

    /**
     * Ordered list of configuration completed by the agent for the OS policy
     * resource.
     *
     * Generated from protobuf field <code>repeated .google.cloud.osconfig.v1.OSPolicyAssignmentReport.OSPolicyCompliance.OSPolicyResourceCompliance.OSPolicyResourceConfigStep config_steps = 2;</code>
     * @param \Google\Cloud\OsConfig\V1\OSPolicyAssignmentReport\OSPolicyCompliance\OSPolicyResourceCompliance\OSPolicyResourceConfigStep[]|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setConfigSteps($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \Google\Cloud\OsConfig\V1\OSPolicyAssignmentReport\OSPolicyCompliance\OSPolicyResourceCompliance\OSPolicyResourceConfigStep::class);
        $this->config_steps = $arr;

        return $this;
    }

    /**
     * The compliance state of the resource.
     *
     * Generated from protobuf field <code>.google.cloud.osconfig.v1.OSPolicyAssignmentReport.OSPolicyCompliance.OSPolicyResourceCompliance.ComplianceState compliance_state = 3;</code>
     * @return int
     */
    public function getComplianceState()
    {
        return $this->compliance_state;
    }

    /**
     * The compliance state of the resource.
     *
     * Generated from protobuf field <code>.google.cloud.osconfig.v1.OSPolicyAssignmentReport.OSPolicyCompliance.OSPolicyResourceCompliance.ComplianceState compliance_state = 3;</code>
     * @param int $var
     * @return $this
     */
    public function setComplianceState($var)
    {
        GPBUtil::checkEnum($var, \Google\Cloud\OsConfig\V1\OSPolicyAssignmentReport\OSPolicyCompliance\OSPolicyResourceCompliance\ComplianceState::class);
        $this->compliance_state = $var;

        return $this;
    }

    /**
     * A reason for the resource to be in the given compliance state.
     * This field is always populated when `compliance_state` is `UNKNOWN`.
     * The following values are supported when `compliance_state == UNKNOWN`
     * * `execution-errors`: Errors were encountered by the agent while
     * executing the resource and the compliance state couldn't be
     * determined.
     * * `execution-skipped-by-agent`: Resource execution was skipped by the
     * agent because errors were encountered while executing prior resources
     * in the OS policy.
     * * `os-policy-execution-attempt-failed`: The execution of the OS policy
     * containing this resource failed and the compliance state couldn't be
     * determined.
     *
     * Generated from protobuf field <code>string compliance_state_reason = 4;</code>
     * @return string
     */
    public function getComplianceStateReason()
    {
        return $this->compliance_state_reason;
    }

    /**
     * A reason for the resource to be in the given compliance state.
     * This field is always populated when `compliance_state` is `UNKNOWN`.
     * The following values are supported when `compliance_state == UNKNOWN`
     * * `execution-errors`: Errors were encountered by the agent while
     * executing the resource and the compliance state couldn't be
     * determined.
     * * `execution-skipped-by-agent`: Resource execution was skipped by the
     * agent because errors were encountered while executing prior resources
     * in the OS policy.
     * * `os-policy-execution-attempt-failed`: The execution of the OS policy
     * containing this resource failed and the compliance state couldn't be
     * determined.
     *
     * Generated from protobuf field <code>string compliance_state_reason = 4;</code>
     * @param string $var
     * @return $this
     */
    public function setComplianceStateReason($var)
    {
        GPBUtil::checkString($var, True);
        $this->compliance_state_reason = $var;

        return $this;
    }

    /**
     * ExecResource specific output.
     *
     * Generated from protobuf field <code>.google.cloud.osconfig.v1.OSPolicyAssignmentReport.OSPolicyCompliance.OSPolicyResourceCompliance.ExecResourceOutput exec_resource_output = 5;</code>
     * @return \Google\Cloud\OsConfig\V1\OSPolicyAssignmentReport\OSPolicyCompliance\OSPolicyResourceCompliance\ExecResourceOutput|null
     */
    public function getExecResourceOutput()
    {
        return $this->readOneof(5);
    }

    public function hasExecResourceOutput()
    {
        return $this->hasOneof(5);
    }

    /**
     * ExecResource specific output.
     *
     * Generated from protobuf field <code>.google.cloud.osconfig.v1.OSPolicyAssignmentReport.OSPolicyCompliance.OSPolicyResourceCompliance.ExecResourceOutput exec_resource_output = 5;</code>
     * @param \Google\Cloud\OsConfig\V1\OSPolicyAssignmentReport\OSPolicyCompliance\OSPolicyResourceCompliance\ExecResourceOutput $var
     * @return $this
     */
    public function setExecResourceOutput($var)
    {
        GPBUtil::checkMessage($var, \Google\Cloud\OsConfig\V1\OSPolicyAssignmentReport\OSPolicyCompliance\OSPolicyResourceCompliance\ExecResourceOutput::class);
        $this->writeOneof(5, $var);

        return $this;
    }

    /**
     * @return string
     */
    public function getOutput()
    {
        return $this->whichOneof("output");
    }

}


