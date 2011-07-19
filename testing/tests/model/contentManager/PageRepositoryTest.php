<?php
use Doctrine\Common\Util\Debug as DoctrineDebug;

include_once('../testCases/DoctrineTestCase.php');

class PageRepositoryTest extends DoctrineTestCase
{
    public function testTree() {
        $repo = self::$em->getRepository('Cx\Model\ContentManager\Page');
        
        $n1 = new \Cx\Model\ContentManager\Node();
        $n2 = new \Cx\Model\ContentManager\Node();
        $n3 = new \Cx\Model\ContentManager\Node();
        $n4 = new \Cx\Model\ContentManager\Node();
        $n5 = new \Cx\Model\ContentManager\Node();

        $n2->setParent($n1);
        $n3->setParent($n2);
        $n4->setParent($n1);
        $n5->setParent($n2);

        $p1 = new \Cx\Model\ContentManager\Page();     
        $p1->setLang(1);
        $p1->setTitle('testpage1');
        $p1->setNode($n1);
        $p1->setUsername('user');

        $p2 = new \Cx\Model\ContentManager\Page();     
        $p2->setLang(2);
        $p2->setTitle('testpage2');
        $p2->setNode($n1);
        $p2->setUsername('user');

        $p3 = new \Cx\Model\ContentManager\Page();     
        $p3->setLang(3);
        $p3->setTitle('testpage3');
        $p3->setNode($n1);
        $p3->setUsername('user');

        $p4 = new \Cx\Model\ContentManager\Page();     
        $p4->setLang(1);
        $p4->setTitle('testpage1_child');
        $p4->setNode($n2);
        $p4->setUsername('user');

        $p5 = new \Cx\Model\ContentManager\Page();     
        $p5->setLang(1);
        $p5->setTitle('subtreeTest_target');
        $p5->setNode($n3);
        $p5->setUsername('user');

        self::$em->persist($n1);
        self::$em->persist($n2);
        self::$em->persist($n3);
        self::$em->persist($n4);
        self::$em->persist($n5);

        self::$em->persist($p1);
        self::$em->persist($p2);
        self::$em->persist($p3);
        self::$em->persist($p4);
        self::$em->persist($p5);

        self::$em->flush();

        //make sure we re-fetch a correct state
        self::$em->clear();

        $tree = $repo->getTree(null,1);

        //check if we get only desired language back
        $pages = $tree[0]->getPages();
        foreach($pages as $page) 
            $this->assertEquals(1, $page->getLang());

        //(I) check if we got the correct translation
        $lang1Page = $tree[0]->getPages();
        $lang1Page = $lang1Page[0];
        $this->assertEquals($lang1Page->getTitle(), 'testpage1');
        //(II) do the same for childs
        $childNode = $tree[0]->getChildren();
        $childNode = $childNode[0];
        $lang1Page = $childNode->getPages();
        $lang1Page = $lang1Page[0];
        $this->assertEquals($lang1Page->getTitle(), 'testpage1_child');        
                
        //page count as expected?
        $this->assertEquals(1, count($tree[0]->getPages()));
        //all pages fetched?
        $this->assertEquals(5, count($tree));
        //children assigned as expected?
        $children = $tree[0]->getChildren();
        $this->assertEquals(2, count($tree[0]->getChildren()));

        //can we fetch a part of the tree?
        $childNode = $tree[0]->getChildren();
        $childNode = $childNode[0];
        $subTree = $repo->getTree($childNode);
        $p = $subTree[0]->getPages();
        $p = $p[0];
        $this->assertEquals('subtreeTest_target', $p->getTitle());
    }

    public function testTreeByTitle() {
        $repo = self::$em->getRepository('Cx\Model\ContentManager\Page');
        
        $n1 = new \Cx\Model\ContentManager\Node();
        $n2 = new \Cx\Model\ContentManager\Node();

        $n2->setParent($n1);

        $p1 = new \Cx\Model\ContentManager\Page();     
        $p1->setLang(1);
        $p1->setTitle('rootTitle_1');
        $p1->setNode($n1);
        $p1->setUsername('user');

        $p2 = new \Cx\Model\ContentManager\Page();     
        $p2->setLang(2);
        $p2->setTitle('rootTitle_1');
        $p2->setNode($n1);
        $p2->setUsername('user');

        $p3 = new \Cx\Model\ContentManager\Page();     
        $p3->setLang(3);
        $p3->setTitle('rootTitle_2');
        $p3->setNode($n1);
        $p3->setUsername('user');

        $p4 = new \Cx\Model\ContentManager\Page();     
        $p4->setLang(3);
        $p4->setTitle('childTitle');
        $p4->setNode($n2);
        $p4->setUsername('user');

        self::$em->persist($n1);
        self::$em->persist($n2);

        self::$em->persist($p1);
        self::$em->persist($p2);
        self::$em->persist($p3);
        self::$em->persist($p4);

        self::$em->flush();

        //make sure we re-fetch a correct state
        self::$em->clear();

        $tree = $repo->getTreeByTitle();

        //check node assigning
        $this->assertInstanceOf('Cx\Model\ContentManager\Node', $tree['rootTitle_1'][$repo::DataProperty]['node']);

        //check lang assigning
        $this->assertEquals(2, count($tree['rootTitle_1'][$repo::DataProperty]['lang']));
        $this->assertEquals(1, count($tree['rootTitle_2'][$repo::DataProperty]['lang']));

        //check children
        $this->assertInstanceOf('Cx\Model\ContentManager\Node', $tree['rootTitle_2']['childTitle'][$repo::DataProperty]['node']);
    }

    public function testPagesAtPath() {
        $repo = self::$em->getRepository('Cx\Model\ContentManager\Page');
        
        $n1 = new \Cx\Model\ContentManager\Node();
        $n2 = new \Cx\Model\ContentManager\Node();

        $n2->setParent($n1);

        $p1 = new \Cx\Model\ContentManager\Page();     
        $p1->setLang(1);
        $p1->setTitle('rootTitle_1');
        $p1->setNode($n1);
        $p1->setUsername('user');

        $p2 = new \Cx\Model\ContentManager\Page();     
        $p2->setLang(2);
        $p2->setTitle('rootTitle_1');
        $p2->setNode($n1);
        $p2->setUsername('user');

        $p3 = new \Cx\Model\ContentManager\Page();     
        $p3->setLang(3);
        $p3->setTitle('rootTitle_2');
        $p3->setNode($n1);
        $p3->setUsername('user');

        $p4 = new \Cx\Model\ContentManager\Page();     
        $p4->setLang(3);
        $p4->setTitle('childTitle');
        $p4->setNode($n2);
        $p4->setUsername('user');

        self::$em->persist($n1);
        self::$em->persist($n2);

        self::$em->persist($p1);
        self::$em->persist($p2);
        self::$em->persist($p3);
        self::$em->persist($p4);

        self::$em->flush();

        //make sure we re-fetch a correct state
        self::$em->clear();

        //1 level
        $match = $repo->getPagesAtPath('rootTitle_1');
        $this->assertEquals('rootTitle_1',$match['matchedPath']);
        $this->assertInstanceOf('Cx\Model\ContentManager\Page',$match['pages'][1]);
        $this->assertEquals(array(1,2),$match['lang']);

        //2 levels
        $match = $repo->getPagesAtPath('rootTitle_2/childTitle');
        $this->assertEquals('rootTitle_2/childTitle',$match['matchedPath']);
        $this->assertInstanceOf('Cx\Model\ContentManager\Page',$match['pages'][3]);
        $this->assertEquals(array(3),$match['lang']);

        //3 levels, 2 in tree
        $match = $repo->getPagesAtPath('rootTitle_2/childTitle/asdfasdf');        
        $this->assertEquals('rootTitle_2/childTitle/',$match['matchedPath']);
        $this->assertInstanceOf('Cx\Model\ContentManager\Page',$match['pages'][3]);
        $this->assertEquals(array(3),$match['lang']);

        //3 levels, wrong lang from 2nd level
        $match = $repo->getPagesAtPath('rootTitle_1/childTitle/asdfasdf');        
        $this->assertEquals('rootTitle_1/',$match['matchedPath']);
        $this->assertInstanceOf('Cx\Model\ContentManager\Page',$match['pages'][1]);
        $this->assertEquals(array(1,2),$match['lang']);

        //inexistant
        $match = $repo->getPagesAtPath('doesNotExist');        
        $this->assertEquals(null,$match);

        //exact matching
        $match = $repo->getPagesAtPath('rootTitle_2/childTitle/asdfasdf', null, null, true);
        $this->assertEquals(null,$match);

        //given lang matching
        $match = $repo->getPagesAtPath('rootTitle_1', null, 1);
        $this->assertEquals('rootTitle_1',$match['matchedPath']);
        $this->assertInstanceOf('Cx\Model\ContentManager\Page',$match['page']);
    }

    public function testGetFromModuleCmdByLang() {
        $repo = self::$em->getRepository('Cx\Model\ContentManager\Page');
        
        $n1 = new \Cx\Model\ContentManager\Node();

        $p1 = new \Cx\Model\ContentManager\Page();     
        $p1->setLang(1);
        $p1->setTitle('rootTitle_1');
        $p1->setNode($n1);
        $p1->setUsername('user');
        $p1->setModule('myModule');
        $p1->setCmd('cmd1');

        $p2 = new \Cx\Model\ContentManager\Page();     
        $p2->setLang(2);
        $p2->setTitle('rootTitle_1');
        $p2->setNode($n1);
        $p2->setUsername('user');
        $p2->setModule('myModule');
        $p2->setCmd('cmd1');


        $p3 = new \Cx\Model\ContentManager\Page();     
        $p3->setLang(3);
        $p3->setTitle('rootTitle_2');
        $p3->setNode($n1);
        $p3->setUsername('user');
        $p3->setModule('myModule');
        $p3->setCmd('cmd2');


        self::$em->persist($n1);

        self::$em->persist($p1);
        self::$em->persist($p2);
        self::$em->persist($p3);

        self::$em->flush();

        //make sure we re-fetch a correct state
        self::$em->clear();

        //test correct fetching
        $pages = $repo->getFromModuleCmdByLang('myModule');

        $this->assertArrayHasKey(1,$pages);
        $this->assertArrayHasKey(2,$pages);
        $this->assertArrayHasKey(3,$pages);

        $this->assertInstanceOf('Cx\Model\ContentManager\Page', $pages[1]);
        $this->assertInstanceOf('Cx\Model\ContentManager\Page', $pages[2]);
        $this->assertInstanceOf('Cx\Model\ContentManager\Page', $pages[3]);

        $this->assertEquals(1, $pages[1]->getLang());
        $this->assertEquals(2, $pages[2]->getLang());
        $this->assertEquals(3, $pages[3]->getLang());

        //test behaviour on specified cmd
        $pages = $repo->getFromModuleCmdByLang('myModule', 'cmd1');
        $this->assertEquals(2, count($pages));
    }

    public function testGetPathToPage() {
        $n1 = new \Cx\Model\ContentManager\Node();
        $n2 = new \Cx\Model\ContentManager\Node();
        $n2->setParent($n1);

        $p1 = new \Cx\Model\ContentManager\Page();     
        $p1->setLang(1);
        $p1->setTitle('root');
        $p1->setNode($n1);
        $p1->setUsername('user');

        $p2 = new \Cx\Model\ContentManager\Page();     
        $p2->setLang(1);
        $p2->setTitle('child');
        $p2->setNode($n2);
        $p2->setUsername('user');

        self::$em->persist($n1);
        self::$em->persist($n2);

        self::$em->persist($p1);
        self::$em->persist($p2);

        $idOfP2 = $p2->getId();

        self::$em->flush();

        //make sure we re-fetch a correct state
        self::$em->clear();

        $pageRepo = self::$em->getRepository('Cx\Model\ContentManager\Page');

        self::$em->getRepository('Cx\Model\ContentManager\Node')->verify();

        $page = $pageRepo->findOneById($p2->getId());
      
        $this->assertEquals('/root/child', $pageRepo->getPath($page));
    }
}