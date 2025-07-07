<?php
namespace App\Models;

class ProposalModel {
    public $id;
    public $content;
    public $voteCount;
    public $isApproved;
    public $creatorId;
    public $year;
    public $department;
    public $votedStudents;

    public function __construct($id, $content, $voteCount, $isApproved, $creatorId, $year, $department, $votedStudents) {
        $this->id = $id;
        $this->content = $content;
        $this->voteCount = $voteCount;
        $this->isApproved = $isApproved;
        $this->creatorId = $creatorId;
        $this->year = $year;
        $this->department = $department;
        $this->votedStudents = $votedStudents;
    }

    public static function fromFirestore($doc) {
        return new ProposalModel(
            $doc->id(),
            $doc->data()['content'],
            $doc->data()['voteCount'],
            $doc->data()['isApproved'],
            $doc->data()['creatorId'],
            $doc->data()['year'],
            $doc->data()['department'],
            $doc->data()['votedStudents'] ?? []
        );
    }

    public function toFirestore() {
        return [
            'content' => $this->content,
            'voteCount' => $this->voteCount,
            'isApproved' => $this->isApproved,
            'creatorId' => $this->creatorId,
            'year' => $this->year,
            'department' => $this->department,
            'votedStudents' => $this->votedStudents,
        ];
    }
}
