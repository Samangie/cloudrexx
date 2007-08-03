<?

/**
 * Message
 *
 * @copyright   CONTREXX CMS - COMVATION AG
 * @author      Reto Kohli <reto.kohli@comvation.com>
 * @version     0.0.1
 * @package     contrexx
 * @subpackage  module_support
 */

/*

Database Tables Structure:

DROP TABLE contrexx_module_support_message;
CREATE TABLE contrexx_module_support_message (
  id            int(10)      unsigned NOT NULL auto_increment,
  ticket_id     int(10)      unsigned NOT NULL,
  `status`      tinyint(2)   unsigned NOT NULL default 1,
  `from`        varchar(255)          NOT NULL,
  subject       varchar(255)          NOT NULL,
  body          mediumtext            NOT NULL,
  `date`        datetime              NOT NULL,
  `timestamp`   timestamp             NOT NULL default current_timestamp,
  PRIMARY KEY     (id),
  KEY ticket_id   (ticket_id),
  KEY status      (status),
  KEY `date`      (`date`),
  KEY `timestamp` (`timestamp`)
) ENGINE=MyISAM;

*/

/**
 * Message
 *
 * Every Support Message is associated with one Support Ticket.
 * Every Support Message is associated with zero or more Attachments.
 * Every Message has the following fields:
 *  id            The Message ID
 *  ticket_id     The associated Ticket ID
 *  `status`      The Message status
 *  from          (Usually) the originating e-mail address
 *  subject       The Message subject line
 *  body          The Message body
 *  `date`        The original Message date and time
 *  `timestamp`   The timestamp of when the Message was inserted
 * @copyright   CONTREXX CMS - COMVATION AG
 * @author      Reto Kohli <reto.kohli@comvation.com>
 * @version     0.0.1
 * @package     contrexx
 * @subpackage  module_support
 */

class Message
{
    /**
     * Message ID
     *
     * From table modules_support_message
     * @var integer
     */
    var $id;

    /**
     * Ticket ID
     *
     * From table modules_support_message
     * @var integer
     */
    var $ticket_id;

    /**
     * Message status
     *
     * From table modules_support_message
     * @var integer
     */
    var $status;

    /**
     * The Message source
     *
     * Usually taken from the original e-mail messages' 'From:' field
     * From table modules_support_message
     * @var string
     */
    var $from;

    /**
     * The Message subject line
     *
     * Usually taken from the original e-mail messages' 'Subject:' field
     * From table modules_support_message
     * @var string
     */
    var $subject;

    /**
     * The Message body
     *
     * Usually taken from the original e-mail messages' text body
     * From table modules_support_message
     * @var string
     */
    var $body;

    /**
     * The original Message date
     *
     * Usually taken from the original e-mail messages' 'Date:' field
     * From table modules_support_message
     * @var string
     */
    var $date;

    /**
     * Timestamp
     *
     * Set to the date and time when the record is created in the
     * database table.
     * From table modules_support_message
     * @var string
     */
    var $timestamp;

    /**
     * Set to true whenever the status of this Message changes.
     *
     * Defaults to false.
     * @var boolean
    var $statusChanged = false;
     */

    /**
     * The status text array
     *
     * *SHOULD* be static
     * @var     array
     */
    var $arrStatusString;


    /**
     * Constructor (PHP4)
     * @copyright   CONTREXX CMS - COMVATION AG
     * @author      Reto Kohli <reto.kohli@comvation.com>
     * @version     0.0.1
     * @see         __construct()
     */
    function Message(
        $ticketId, $status, $from, $subject, $body, $date, $timestamp, $id=0
    ) {
        $this->__construct(
            $ticketId, $status, $from, $subject, $body, $date, $timestamp, $id
        );
    }

    /**
     * Constructor (PHP5)
     * @global      array   $_ARRAYLANG     Language array
     * @copyright   CONTREXX CMS - COMVATION AG
     * @author      Reto Kohli <reto.kohli@comvation.com>
     * @version     0.0.1
     * @todo        PHP5: Make $this->arrStatusString static!
     * @global  array       $_ARRAYLANG     Language array
     */
    function __construct(
        $ticketId, $status, $from, $subject, $body, $date, $timestamp, $id=0)
    {
        global $_ARRAYLANG;

        $this->ticketId  = $ticketId;
        $this->status    = $status;
        $this->from      = $from;
        $this->subject   = $subject;
        $this->body      = $body;
        $this->date      = $date;
        $this->timestamp = $timestamp;
        $this->id        = $id;
/*
        $this->statusChanged = false;
*/
        /**
         * Message State text array
         * *SHOULD* be static
         */
        $this->arrStatusString = array(
            SUPPORT_MESSAGE_STATUS_UNKNOWN => $_ARRAYLANG['TXT_SUPPORT_MESSAGE_STATUS_UNKNOWN'],
            SUPPORT_MESSAGE_STATUS_NEW     => $_ARRAYLANG['TXT_SUPPORT_MESSAGE_STATUS_NEW'],
            SUPPORT_MESSAGE_STATUS_READ    => $_ARRAYLANG['TXT_SUPPORT_MESSAGE_STATUS_READ'],
            SUPPORT_MESSAGE_STATUS_DELETED => $_ARRAYLANG['TXT_SUPPORT_MESSAGE_STATUS_DELETED'],
        );
    }


    /**
     * Get this Messages' ID
     * @return  integer     The Message ID
     */
    function getId()
    {
        return $this->Id;
    }

    /**
     * Get this Messages' Ticket ID
     * @return  integer     The Ticket ID
     */
    function getTicketId()
    {
        return $this->ticket_id;
    }
    /**
     * Set this Messages' Ticket ID
     * @param   integer     The  Ticket ID
    function setTicketId($ticketId)
    {
        $this->ticketId = intval($ticketId);
    }
     */

    /**
     * Get this Messages' status
     * @return  integer     The Message status
     */
    function getStatus()
    {
        return $this->status;
    }
    /**
     * Set this Messages' status
     * @param   string      The Message status
     */
    function setStatus($status)
    {
        $this->status = intval($status);
        $this->statusChanged = true;
    }

    /**
     * Get this Messages' source (e-mail address)
     * @return  string      The Message source
     */
    function getFrom()
    {
        return $this->from;
    }
    /**
     * Set this Messages' source (e-mail address)
     * @param   string      The Message source
    function setFrom($from)
    {
        $this->from = strip_tags($from);
    }
     */

    /**
     * Get this Messages' subject line
     * @return  string      The Message subject line
     */
    function getSubject()
    {
        return $this->subject;
    }
    /**
     * Set this Messages' subject line
     * @param   string      The Message subject line
    function setSubject($subject)
    {
        $this->subject = strip_tags($subject);
    }
     */

    /**
     * Get this Messages' body
     * @return  string      The Message body
     */
    function getBody()
    {
        return $this->body;
    }
    /**
     * Set this Messages' body
     * @param   string      The Message body
    function setBody($body)
    {
        $this->body = strip_tags($body);
    }
     */

    /**
     * Get this Messages' date
     * @return  string      The Message date
     */
    function getDate()
    {
        return $this->date;
    }
    /**
     * Set this Messages' date
     * @param   string      The Message date
    function setDate($date)
    {
        $this->date = $date;
    }
     */

    /**
     * Get this Messages' timestamp
     * @return  string      The Message timestamp
     */
    function getTimestamp()
    {
        return $this->timestamp;
    }
    /**
     * Set this Messages' timestamp
     * @param   string      The Message timestamp
    function setTimestamp($timestamp)
    {
        $this->timestamp = $timestamp;
    }
     */


    /**
     * Get this Messages' status as a string
     * @return  string      The Message status string
     */
    function getStatusString()
    {
        return $this->arrStatusString[$this->status];
    }


    /**
     * Delete this Message from the database.
     *
     * Note that this *SHOULD* only be done when the associated Ticket
     * is deleted as well!
     * @return      boolean                     True on success, false otherwise
     * @global      mixed       $objDatabase    Database object
     * @copyright   CONTREXX CMS - COMVATION AG
     * @author      Reto Kohli <reto.kohli@comvation.com>
     */
    function delete()
    {
        global $objDatabase;
//echo("Debug: Message::delete(): entered<br />");

        if (!$this->id) {
echo("Message::delete(): Error: This Message is missing its ID!<br />");
            return false;
        }
        $objResult = $objDatabase->Execute("
            DELETE FROM ".DBPREFIX."module_support_message
             WHERE id=$this->id
        ");
        if (!$objResult) {
echo("Message::delete(): Error: Failed to delete the Message from the database!<br />");
            return false;
        }
        return true;
    }


    /**
     * Stores this Message in the database.
     *
     * Either updates (id > 0) or inserts (id == 0) the object.
     * @return      boolean     True on success, false otherwise
     * @copyright   CONTREXX CMS - COMVATION AG
     * @author      Reto Kohli <reto.kohli@comvation.com>
     */
    function store()
    {
        if ($this->id > 0) {
            return $this->update();
        }
        return $this->insert();
    }


    /**
     * Update this Message in the database.
     *
     * Note that currently, only the status field may be updated.
     * @return      boolean                     True on success, false otherwise
     * @global      mixed       $objDatabase    Database object
     * @copyright   CONTREXX CMS - COMVATION AG
     * @author      Reto Kohli <reto.kohli@comvation.com>
     */
    function update()
    {
        global $objDatabase;

        $query = "
            UPDATE ".DBPREFIX."module_support_message
               SET 'status'=$this->status,
             WHERE id=$this->id
        ";
        $objResult = $objDatabase->Execute($query);
        if (!$objResult) {
            return false;
        }
//echo("Message::update(): done<br />");
        return true;
    }


    /**
     * Insert this Message into the database.
     *
     * Note that the status field *MUST* be set to the correct default
     * value of 1 (NEW), as specified in the table definition.
     * @return      boolean                     True on success, false otherwise
     * @global      mixed       $objDatabase    Database object
     * @copyright   CONTREXX CMS - COMVATION AG
     * @author      Reto Kohli <reto.kohli@comvation.com>
     */
    function insert()
    {
        global $objDatabase;

        $query = "
            INSERT INTO ".DBPREFIX."module_support_message (
                   ticket_id, `from`, subject, body, `date`
            ) VALUES (
                   $this->ticketId,
                   $this->from,
                   $this->subject,
                   $this->body,
                   $this->date
            )
        ";
        $objResult = $objDatabase->Execute($query);
        if (!$objResult) {
            return false;
        }
        $this->id = $objDatabase->Insert_ID();
        // Update the object with the actual timestamp
//echo("Message::insert(): done<br />");
        return $this->refreshTimestamp();
    }


    /**
     * Updates the Message object with the timestamp value stored in the
     * database.
     *
     * This *MUST* be called by insert() after INSERTing any new
     * Message object!
     * @return  boolean         True on success, false otherwise.
     */
    function refreshTimestamp()
    {
        global $objDatabase;

        $query = "
            SELECT 'timestamp'
              FROM ".DBPREFIX."module_support_message
             WHERE id=$this->id
        ";
echo("Message::refreshTimestamp(): query: $query<br />");
        $objResult = $objDatabase->Execute($query);
echo("Message::refreshTimestamp(): objResult: '$objResult'<br />");
        if (!$objResult) {
echo("Message::refreshTimestamp(): query failed, objResult: '$objResult', count: ".$objResult->RecordCount()."<br />");
            return false;
        }
        if ($objResult->RecordCount() == 0) {
echo("Message::refreshTimestamp(): no result: ".$objResult->RecordCount()."<br />");
            return false;
        }
        $this->timestamp = $objResult->fields('timestamp');
        return true;
    }


    /**
     * Select a Message by ID from the database.
     * @static
     * @param       integer     $id             The Message ID
     * @return      Message                      The Message object
     *                                          on success, false otherwise
     * @global      mixed       $objDatabase    Database object
     * @copyright   CONTREXX CMS - COMVATION AG
     * @author      Reto Kohli <reto.kohli@comvation.com>
     */
    //static
    function getById($id)
    {
        global $objDatabase;

        $query = "
            SELECT *
              FROM ".DBPREFIX."module_support_message
             WHERE id=$id
        ";
echo("Message::getById($id): query: $query<br />");
        $objResult = $objDatabase->Execute($query);
echo("Message::getById($id): objResult: '$objResult'<br />");
        if (!$objResult) {
echo("Message::getById($id): query failed, objResult: '$objResult', count: ".$objResult->RecordCount()."<br />");
            return false;
        }
        if ($objResult->RecordCount() == 0) {
echo("Message::getById($id): no result: ".$objResult->RecordCount()."<br />");
            return false;
        }
        $objMessage = new Message(
            $objResult->fields('ticket_id'),
            $objResult->fields('status'),
            $objResult->fields('from'),
            $objResult->fields('subject'),
            $objResult->fields('body'),
            $objResult->fields('date'),
            $objResult->fields('timestamp'),
            $objResult->fields('id')
        );
        return $objMessage;
    }


    /**
     * Returns an array of Message objects related to a certain
     * ticket ID, or with a given status, from, subject, or date
     * from the database.
     *
     * Any of the mandatory arguments may contain values evaluating to
     * the boolean false value, in which case they are not considered
     * in the WHERE clause.  Any such arguments that evaluate to true,
     * however, limit the result set to records having identical values.
     * The optional parameter $order determines the sorting order
     * in SQL syntax, it defaults to ordered by date descending, or
     * latest first.
     * The optional parameter $offset determines the offset of the
     * first Message to be read from the database, and defaults to 0 (zero).
     * The optional parameter $limit limits the number of results.
     * It defaults to the value of the global $_CONFIG['corePagingLimit']
     * setting if unset or zero.
     * @static
     * @param       integer     $event          The desired event code, or zero
     * @param       integer     $foreignId      The desired foreign ID, or zero
     * @param       string      $table          The desired table name, or the
     *                                          empty string
     * @param       string      $field          The desired field name, or the
     *                                          empty string
     * @param       string      $value          The desired field value, or the
     *                                          empty string
     * @param       string      $order          The sorting order
     * @param       integer     $offset         The offset
     * @return      array                       The array of Message objects
     * @global      mixed       $objDatabase    Database object
     * @global      array       $_CONFIG        Global configuration array
     *                                          on success, false otherwise
     * @copyright   CONTREXX CMS - COMVATION AG
     * @author      Reto Kohli <reto.kohli@comvation.com>
     */
    //static
    function getMessageArray(
        $ticketId, $status, $from, $subject, $date,
        $order="'timestamp' DESC", $offset=0, $limit=0
    ) {
        global $objDatabase, $_CONFIG;

        $limit = ($limit ? $limit : $_CONFIG['corePagingLimit']);
        $query = "
            SELECT id
              FROM ".DBPREFIX."module_support_action
             WHERE 1
              ".($ticketId  ? "AND ticket_id=$ticketId" : '')."
              ".($status    ? "AND status=$status"      : '')."
              ".($from      ? "AND from='$from'"        : '')."
              ".($subject   ? "AND subject='$subject'"  : '')."
              ".($date      ? "AND date='$date'"        : '')."
          ORDER BY $order
        ";
        $objResult = $objDatabase->SelectLimit($query, $limit, $offset);
        if (!$objResult) {
            return false;
        }
        // return array
        $arrMessage = array();
        while (!$objResult->EOF) {
            $arrMessage[] = Message::getById($objResult->fields['id']);
            $objResult->MoveNext();
        }
        return $arrMessage;
    }
}

?>
